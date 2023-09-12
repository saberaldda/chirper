<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;

    protected $guarded;

    protected $hidden = [
        'social_token',
    ];

    protected $casts = [
        'social_token' => 'encrypted',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
