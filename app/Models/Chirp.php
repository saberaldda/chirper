<?php

namespace App\Models;

use App\Events\ChirpCreatedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chirp extends Model
{
    use HasFactory;

    protected $guarded;

    protected $dispatchesEvents = [
        'created' => ChirpCreatedEvent::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
