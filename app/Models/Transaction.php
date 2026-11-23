<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'invitation_id',
        'merchant_order_id',
        'amount',
        'package_tier',
        'status',
        'reference',
        'payment_method',
        'payment_url',
        'response_payload',
        'paid_at',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'amount' => 'integer',
            'response_payload' => 'array',
            'paid_at' => 'datetime',
        ];
    }

    /**
     * User who initiated the transaction.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Invitation being upgraded.
     */
    public function invitation(): BelongsTo
    {
        return $this->belongsTo(Invitation::class);
    }

    /**
     * Check if transaction is paid successfully.
     */
    public function isSuccess(): bool
    {
        return $this->status === 'success';
    }
}
