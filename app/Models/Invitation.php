<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Invitation extends Model
{
    protected $fillable = [
        'user_id',
        'theme_id',
        'slug',
        'title',
        'groom_name',
        'groom_nickname',
        'groom_parents',
        'groom_instagram',
        'groom_photo',
        'bride_name',
        'bride_nickname',
        'bride_parents',
        'bride_instagram',
        'bride_photo',
        'background_photo',
        'countdown_photo',
        'story_photo_1',
        'story_photo_2',
        'story_photo_3',
        'story_photo_4',
        'custom_ornament_header',
        'custom_ornament_side',
        'event_date',
        'event_time',
        'event_end_time',
        'venue',
        'address',
        'maps_url',
        'quran_text',
        'quran_translation',
        'quote_source',
        'show_quote',
        'show_love_story',
        'love_stories',
        'akad_date',
        'akad_time',
        'akad_end_time',
        'akad_venue',
        'akad_address',
        'akad_maps_url',
        'music_id',
        'gift_bank_name',
        'gift_account_number',
        'gift_account_holder',
        'gift_address',
        'gift_recipient_name',
        'gift_phone',
        'gift_maps_url',
        'closing_title',
        'closing_message',
        'closing_signature',
        'whatsapp_template',
        'custom_music_path',
        'status',
        'is_premium',
        'package_tier',
        'payment_status',
        'paid_amount',
        'paid_at',
        'published_at',
    ];

    protected $casts = [
        'event_date' => 'date',
        'event_time' => 'datetime',
        'akad_date' => 'date',
        'akad_time' => 'datetime',
        'show_quote' => 'boolean',
        'show_love_story' => 'boolean',
        'is_premium' => 'boolean',
        'paid_amount' => 'integer',
        'paid_at' => 'datetime',
        'love_stories' => 'array',
        'published_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($invitation) {
            if (! $invitation->slug) {
                $invitation->slug = Str::slug($invitation->groom_nickname.'-'.$invitation->bride_nickname);
            }
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function theme(): BelongsTo
    {
        return $this->belongsTo(Theme::class);
    }

    public function music(): BelongsTo
    {
        return $this->belongsTo(Music::class);
    }

    public function photos(): HasMany
    {
        return $this->hasMany(InvitationPhoto::class)->orderBy('sort_order');
    }

    public function guests(): HasMany
    {
        return $this->hasMany(InvitationGuest::class);
    }

    public function rsvps(): HasMany
    {
        return $this->hasMany(Rsvp::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function giftAccounts(): HasMany
    {
        return $this->hasMany(GiftAccount::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function isPublished(): bool
    {
        return $this->status === 'published';
    }

    public function getGroomPhotoUrlAttribute(): ?string
    {
        if ($this->groom_photo && Storage::disk('public')->exists($this->groom_photo)) {
            return asset('storage/'.$this->groom_photo);
        }

        if ($this->groom_photo && Str::startsWith($this->groom_photo, ['http://', 'https://'])) {
            return $this->groom_photo;
        }

        return null;
    }

    public function getBridePhotoUrlAttribute(): ?string
    {
        if ($this->bride_photo && Storage::disk('public')->exists($this->bride_photo)) {
            return asset('storage/'.$this->bride_photo);
        }

        if ($this->bride_photo && Str::startsWith($this->bride_photo, ['http://', 'https://'])) {
            return $this->bride_photo;
        }

        return null;
    }

    public function getCoverPhotoUrlAttribute(): ?string
    {
        return $this->background_photo_url;
    }

    public function getCoverPhotoAttribute(): ?string
    {
        return $this->background_photo;
    }

    public function getBackgroundPhotoUrlAttribute(): ?string
    {
        if ($this->background_photo && Storage::disk('public')->exists($this->background_photo)) {
            return asset('storage/'.$this->background_photo);
        }

        if ($this->background_photo && Str::startsWith($this->background_photo, ['http://', 'https://'])) {
            return $this->background_photo;
        }

        if ($this->photos && $this->photos->count() > 0) {
            $first = $this->photos->first()->path;
            if ($first && Storage::disk('public')->exists($first)) {
                return asset('storage/'.$first);
            }
            if ($first && Str::startsWith($first, ['http://', 'https://'])) {
                return $first;
            }
        }

        return null;
    }

    public function getCountdownPhotoUrlAttribute(): ?string
    {
        if ($this->countdown_photo && Storage::disk('public')->exists($this->countdown_photo)) {
            return asset('storage/'.$this->countdown_photo);
        }

        if ($this->countdown_photo && Str::startsWith($this->countdown_photo, ['http://', 'https://'])) {
            return $this->countdown_photo;
        }

        return null;
    }

    public function getStoryPhoto1UrlAttribute(): ?string
    {
        if ($this->story_photo_1 && Storage::disk('public')->exists($this->story_photo_1)) {
            return asset('storage/'.$this->story_photo_1);
        }

        if ($this->story_photo_1 && Str::startsWith($this->story_photo_1, ['http://', 'https://'])) {
            return $this->story_photo_1;
        }

        return null;
    }

    public function getStoryPhoto2UrlAttribute(): ?string
    {
        if ($this->story_photo_2 && Storage::disk('public')->exists($this->story_photo_2)) {
            return asset('storage/'.$this->story_photo_2);
        }

        if ($this->story_photo_2 && Str::startsWith($this->story_photo_2, ['http://', 'https://'])) {
            return $this->story_photo_2;
        }

        return null;
    }

    public function getStoryPhoto3UrlAttribute(): ?string
    {
        if ($this->story_photo_3 && Storage::disk('public')->exists($this->story_photo_3)) {
            return asset('storage/'.$this->story_photo_3);
        }

        if ($this->story_photo_3 && Str::startsWith($this->story_photo_3, ['http://', 'https://'])) {
            return $this->story_photo_3;
        }

        return null;
    }

    public function getStoryPhoto4UrlAttribute(): ?string
    {
        if ($this->story_photo_4 && Storage::disk('public')->exists($this->story_photo_4)) {
            return asset('storage/'.$this->story_photo_4);
        }

        if ($this->story_photo_4 && Str::startsWith($this->story_photo_4, ['http://', 'https://'])) {
            return $this->story_photo_4;
        }

        return null;
    }

    public function getCustomOrnamentHeaderUrlAttribute(): ?string
    {
        if ($this->custom_ornament_header && Storage::disk('public')->exists($this->custom_ornament_header)) {
            return asset('storage/'.$this->custom_ornament_header);
        }

        if ($this->custom_ornament_header && Str::startsWith($this->custom_ornament_header, ['http://', 'https://'])) {
            return $this->custom_ornament_header;
        }

        return null;
    }

    public function getCustomOrnamentSideUrlAttribute(): ?string
    {
        if ($this->custom_ornament_side && Storage::disk('public')->exists($this->custom_ornament_side)) {
            return asset('storage/'.$this->custom_ornament_side);
        }

        if ($this->custom_ornament_side && Str::startsWith($this->custom_ornament_side, ['http://', 'https://'])) {
            return $this->custom_ornament_side;
        }

        return null;
    }

    public function getDaysRemainingAttribute(): int
    {
        if (! $this->event_date) {
            return 0;
        }

        return (int) max(0, floor(now()->startOfDay()->diffInDays($this->event_date->startOfDay(), false)));
    }

    public function getMilestonesAttribute(): array
    {
        if (! empty($this->love_stories) && is_array($this->love_stories)) {
            return $this->love_stories;
        }

        return [
            [
                'year' => 'Tahun 2020',
                'title' => 'Awal Bertemu',
                'story' => 'Pertama kali dipertemukan di sebuah perpustakaan kota saat menyelesaikan tugas akhir. Obrolan singkat mengenai buku membuka jalan cerita indah kami.',
            ],
            [
                'year' => 'Tahun 2022',
                'title' => 'Komitmen Bersama',
                'story' => 'Setelah saling mengenal karakter dan tujuan hidup masing-masing, kami memantapkan hati untuk saling mendukung dan berkomitmen melangkah bersama.',
            ],
            [
                'year' => 'Tahun 2024',
                'title' => 'Bertunangan',
                'story' => 'Di hadapan kedua keluarga besar, kami melangsungkan prosesi lamaran suci sebagai tanda keseriusan menuju ikatan pernikahan yang barakah.',
            ],
            [
                'year' => 'Tahun 2026',
                'title' => 'Hari Pernikahan',
                'story' => 'Kini, dengan penuh rasa syukur, kami mengikat janji suci pernikahan untuk saling menyayangi hingga ke surga-Nya.',
            ],
        ];
    }

    public function getPackageTier(): string
    {
        if ($this->is_premium) {
            return 'premium';
        }

        if ($this->package_tier && $this->package_tier !== 'basic') {
            return $this->package_tier;
        }

        if ($this->user && $this->user->hasLifetimePremium()) {
            return 'premium';
        }

        return $this->package_tier ?: 'basic';
    }

    public function getPackageLabel(): string
    {
        return match ($this->getPackageTier()) {
            'basic_addon_1' => 'Add-On Paket Basic 1',
            'basic_addon_2' => 'Add-On Paket Basic 2',
            'premium' => 'Premium',
            default => $this->payment_status === 'paid' ? 'Basic (Berbayar)' : 'Basic (Gratis)',
        };
    }

    public function getPackageShortName(): string
    {
        return match ($this->getPackageTier()) {
            'basic_addon_1' => 'Add-On Basic 1',
            'basic_addon_2' => 'Add-On Basic 2',
            'premium' => 'Premium',
            default => 'Basic',
        };
    }

    public function getPaymentStatusKey(): string
    {
        if ($this->user && $this->user->hasLifetimePremium()) {
            return 'paid';
        }

        if ($this->payment_status === 'paid' || $this->is_premium || in_array($this->package_tier, ['basic_addon_1', 'basic_addon_2', 'premium'], true)) {
            return 'paid';
        }

        if ($this->payment_status === 'unpaid') {
            return 'unpaid';
        }

        return 'free';
    }

    public function getPaymentStatusLabel(): string
    {
        return match ($this->getPaymentStatusKey()) {
            'paid' => 'Lunas',
            'unpaid' => 'Belum Dibayar',
            default => 'Gratis',
        };
    }

    public function getGuestLimit(): ?int
    {
        return match ($this->getPackageTier()) {
            'basic_addon_1' => 12,
            'basic_addon_2' => 17,
            'premium' => null,
            default => 5,
        };
    }

    public function getSongLimit(): ?int
    {
        return match ($this->getPackageTier()) {
            'basic_addon_1' => 10,
            'basic_addon_2' => 20,
            'premium' => null,
            default => 5,
        };
    }

    public function canUploadCustomMusic(): bool
    {
        return $this->getPackageTier() === 'premium';
    }

    public function canBePublished(?Theme $targetTheme = null): bool
    {
        $user = $this->user;
        if ($user && $user->hasLifetimePremium()) {
            return true;
        }

        $theme = $targetTheme ?? $this->theme;
        if ($theme && $theme->isPremium() && ! $this->is_premium) {
            return false;
        }

        if ($this->getPaymentStatusKey() === 'unpaid') {
            return false;
        }

        if ($this->getPaymentStatusKey() === 'free' && $user && $user->has_used_free_quota && $this->published_at === null) {
            return false;
        }

        return true;
    }

    public function canAddGuest(int $additional = 1): bool
    {
        $limit = $this->getGuestLimit();
        if ($limit === null) {
            return true;
        }

        return ($this->guests()->count() + $additional) <= $limit;
    }

    public function canAccessMusic(?Music $music): bool
    {
        if (! $music) {
            return true;
        }

        $tier = $music->tier ?: 'basic';
        $packageTier = $this->getPackageTier();

        if ($packageTier === 'premium') {
            return true;
        }

        if ($packageTier === 'basic_addon_2') {
            return in_array($tier, ['basic', 'basic_addon_1', 'basic_addon_2'], true);
        }

        if ($packageTier === 'basic_addon_1') {
            return in_array($tier, ['basic', 'basic_addon_1'], true);
        }

        return $tier === 'basic';
    }
}
