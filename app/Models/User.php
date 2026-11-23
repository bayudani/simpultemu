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

#[Fillable(['name', 'email', 'password', 'role', 'is_premium', 'package_tier', 'google_id', 'avatar', 'email_verified_at'])]
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
}
