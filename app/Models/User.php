<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable([
    'name',
    'email',
    'password',
    'role',
    'is_premium',
    'package_tier',
    'has_used_free_quota',
    'free_quota_used_at',
    'basic_invitation_credits',
    'premium_invitation_credits',
    'google_id',
    'avatar',
    'email_verified_at',
])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_premium' => 'boolean',
            'has_used_free_quota' => 'boolean',
            'free_quota_used_at' => 'datetime',
            'basic_invitation_credits' => 'integer',
            'premium_invitation_credits' => 'integer',
        ];
    }

    public function invitations(): HasMany
    {
        return $this->hasMany(Invitation::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Cek apakah user memiliki hak akses akun Premium Selamanya (Lifetime VIP).
     * Diberikan khusus oleh Admin melalui menu Manajemen Pengguna.
     */
    public function hasLifetimePremium(): bool
    {
        return $this->role === 'admin' || ((bool) $this->is_premium && $this->package_tier === 'premium') || ($this->package_tier === 'premium');
    }

    public function isPremium(): bool
    {
        return $this->hasLifetimePremium();
    }

    public function getPackageTier(): string
    {
        return $this->hasLifetimePremium() ? 'premium' : 'basic';
    }

    public function getPackageLabel(): string
    {
        return $this->hasLifetimePremium() ? 'Premium Selamanya' : 'Reguler (Bayar Per Undangan)';
    }

    public function getGuestLimit(): ?int
    {
        return $this->hasLifetimePremium() ? null : 5;
    }

    public function getSongLimit(): ?int
    {
        return $this->hasLifetimePremium() ? null : 5;
    }

    public function canAccessMusicTier(?string $musicTier): bool
    {
        if ($this->hasLifetimePremium()) {
            return true;
        }

        $tier = $musicTier ?: 'basic';

        return $tier === 'basic';
    }

    /**
     * Cek apakah akun masih berhak membuat undangan pertama Basic gratis.
     */
    public function canUseFreeQuota(): bool
    {
        if ($this->hasLifetimePremium() || $this->has_used_free_quota) {
            return false;
        }

        return ! $this->invitations()->where('payment_status', 'free')->exists();
    }

    /**
     * Total kredit undangan berbayar (Basic Rp10.000 atau Premium Rp59.000) yang belum dipakai.
     */
    public function availablePaidSlotsCount(): int
    {
        return max(0, (int) $this->basic_invitation_credits) + max(0, (int) $this->premium_invitation_credits);
    }

    /**
     * Cek apakah akun boleh memulai pembuatan undangan baru (gratis pertama, punya kredit slot, atau VIP).
     */
    public function canStartNewInvitation(): bool
    {
        return $this->hasLifetimePremium()
            || $this->availablePaidSlotsCount() > 0
            || $this->canUseFreeQuota();
    }

    /**
     * Tandai kuota gratis akun telah dipakai permanen (tidak kembali meski undangan dihapus).
     */
    public function markFreeQuotaUsed(): void
    {
        if (! $this->has_used_free_quota) {
            $this->forceFill([
                'has_used_free_quota' => true,
                'free_quota_used_at' => now(),
            ])->save();
        }
    }
}
