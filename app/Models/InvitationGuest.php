<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class InvitationGuest extends Model
{
    protected $fillable = [
        'invitation_id',
        'name',
        'phone',
        'category',
        'unique_token',
        'invitation_url',
        'whatsapp_message',
        'sent_at',
        'opened_at',
        'rsvp_status',
    ];

    protected $casts = [
        'sent_at' => 'datetime',
        'opened_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($guest) {
            if (! $guest->unique_token) {
                $guest->unique_token = strtoupper(Str::random(8));
            }
        });
    }

    public function invitation(): BelongsTo
    {
        return $this->belongsTo(Invitation::class);
    }

    public function rsvps(): HasMany
    {
        return $this->hasMany(Rsvp::class);
    }

    public function markAsOpened(): void
    {
        if (! $this->opened_at) {
            $this->update(['opened_at' => now()]);
        }
    }
}
