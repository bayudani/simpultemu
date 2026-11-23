<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Music extends Model
{
    protected $table = 'music';

    protected $fillable = [
        'title',
        'artist',
        'tier',
        'file_path',
        'duration',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    protected $appends = [
        'audio_url',
        'url',
        'category',
        'tier_label',
        'tier_order',
        'formatted_duration',
    ];

    public function getAudioUrlAttribute(): string
    {
        if (empty($this->file_path)) {
            return '';
        }

        if (str_starts_with($this->file_path, 'http://') || str_starts_with($this->file_path, 'https://')) {
            return $this->file_path;
        }

        $cleanPath = ltrim($this->file_path, '/');
        if (file_exists(public_path($cleanPath))) {
            return asset($cleanPath);
        }

        return asset('storage/'.$cleanPath);
    }

    public function getUrlAttribute(): string
    {
        return $this->audio_url;
    }

    /**
     * Konversi format teks durasi (e.g. "03:45", "03:00", "01:15:30", atau "180") menjadi integer detik.
     */
    public static function parseDurationToSeconds(mixed $duration): int
    {
        if (empty($duration)) {
            return 180;
        }

        if (is_numeric($duration)) {
            return max(1, (int) $duration);
        }

        if (is_string($duration) && str_contains($duration, ':')) {
            $parts = array_map('intval', explode(':', trim($duration)));
            if (count($parts) === 2) {
                return max(1, ($parts[0] * 60) + $parts[1]);
            }
            if (count($parts) === 3) {
                return max(1, ($parts[0] * 3600) + ($parts[1] * 60) + $parts[2]);
            }
        }

        return 180;
    }

    /**
     * Mutator untuk kolom duration agar selalu disimpan sebagai integer detik di database.
     */
    public function setDurationAttribute(mixed $value): void
    {
        $this->attributes['duration'] = static::parseDurationToSeconds($value);
    }

    public function getFormattedDurationAttribute(): string
    {
        if (! $this->duration) {
            return '03:00';
        }

        if (is_numeric($this->duration)) {
            $mins = floor($this->duration / 60);
            $secs = $this->duration % 60;

            return sprintf('%02d:%02d', $mins, $secs);
        }

        return (string) $this->duration;
    }

    public function getCategoryAttribute(): string
    {
        return $this->id <= 10 ? 'Modern Acoustic' : 'Classical & Sacred';
    }

    public function getTierLabelAttribute(): string
    {
        return match ($this->tier) {
            'basic_addon_1' => 'Add-On 1',
            'basic_addon_2' => 'Add-On 2',
            'premium' => 'Premium',
            default => 'Basic',
        };
    }

    public function getTierOrderAttribute(): int
    {
        if (isset($this->attributes['tier_order'])) {
            return (int) $this->attributes['tier_order'];
        }

        $tierPriority = ['basic' => 1, 'basic_addon_1' => 2, 'basic_addon_2' => 3, 'premium' => 4];
        $myPriority = $tierPriority[$this->tier ?: 'basic'] ?? 1;

        $previousTiersCount = 0;
        foreach ($tierPriority as $t => $priority) {
            if ($priority < $myPriority) {
                $previousTiersCount += static::where('tier', $t)->count();
            }
        }

        $intraTierOrder = static::where('tier', $this->tier ?: 'basic')
            ->where(function ($q) {
                $q->where('order', '<', $this->order ?: 1)
                    ->orWhere(function ($sub) {
                        $sub->where('order', $this->order ?: 1)
                            ->where('id', '<=', $this->id);
                    });
            })
            ->count() + 1;

        return $previousTiersCount + $intraTierOrder;
    }

    public function invitations(): HasMany
    {
        return $this->hasMany(Invitation::class);
    }

    /**
     * Susun ulang seluruh nomor urut lagu agar selalu berurutan (1, 2, 3, ...) tanpa celah.
     */
    public static function reindexOrders(): void
    {
        $tracks = static::orderBy('order', 'asc')->orderBy('id', 'asc')->get();
        foreach ($tracks as $index => $track) {
            $expected = $index + 1;
            if ($track->order !== $expected) {
                $track->updateQuietly(['order' => $expected]);
            }
        }
    }

    /**
     * Pindahkan lagu ke nomor urut spesifik ($targetOrder) dan sesuaikan urutan lagu lainnya.
     */
    public function moveToOrder(int $targetOrder): bool
    {
        $total = static::count();
        if ($total <= 1) {
            $this->order = 1;
            $this->saveQuietly();

            return false;
        }

        $targetOrder = max(1, min($targetOrder, $total));
        $currentOrder = $this->order ?: $this->id;

        if ($targetOrder === $currentOrder) {
            return false;
        }

        if ($targetOrder < $currentOrder) {
            // Pindah ke nomor lebih kecil (geser ke atas)
            static::where('order', '>=', $targetOrder)
                ->where('order', '<', $currentOrder)
                ->where('id', '!=', $this->id)
                ->increment('order');
        } else {
            // Pindah ke nomor lebih besar (geser ke bawah)
            static::where('order', '>', $currentOrder)
                ->where('order', '<=', $targetOrder)
                ->where('id', '!=', $this->id)
                ->decrement('order');
        }

        $this->order = $targetOrder;
        $this->saveQuietly();

        static::reindexOrders();

        return true;
    }

    /**
     * Naikkan urutan lagu 1 nomor (Move Up).
     */
    public function moveUp(): bool
    {
        if ($this->order <= 1) {
            return false;
        }

        $previousTrack = static::where('order', '<', $this->order)
            ->orderBy('order', 'desc')
            ->first();

        if ($previousTrack) {
            $oldOrder = $this->order;
            $this->order = $previousTrack->order;
            $previousTrack->order = $oldOrder;

            $this->saveQuietly();
            $previousTrack->saveQuietly();

            static::reindexOrders();

            return true;
        }

        return $this->moveToOrder($this->order - 1);
    }

    /**
     * Turunkan urutan lagu 1 nomor (Move Down).
     */
    public function moveDown(): bool
    {
        $maxOrder = static::max('order') ?? static::count();
        if ($this->order >= $maxOrder) {
            return false;
        }

        $nextTrack = static::where('order', '>', $this->order)
            ->orderBy('order', 'asc')
            ->first();

        if ($nextTrack) {
            $oldOrder = $this->order;
            $this->order = $nextTrack->order;
            $nextTrack->order = $oldOrder;

            $this->saveQuietly();
            $nextTrack->saveQuietly();

            static::reindexOrders();

            return true;
        }

        return $this->moveToOrder($this->order + 1);
    }
}
