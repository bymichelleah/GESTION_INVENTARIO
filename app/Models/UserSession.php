<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSession extends Model
{
    use HasFactory;

    protected $table = 'user_sessions'; // tu tabla personalizada

    protected $fillable = [
        'user_id',
        'device',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

