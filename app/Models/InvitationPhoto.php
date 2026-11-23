<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvitationPhoto extends Model
{
    protected $fillable = [
        'invitation_id',
        'path',
        'slot',
        'sort_order',
        'alt_text',
    ];

    public function invitation(): BelongsTo
    {
        return $this->belongsTo(Invitation::class);
    }
}
