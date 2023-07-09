<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelegramSession extends Model
{
    use HasFactory;

    protected $fillable =
    [   'chat_mode',
        'chat_id',
        'secret_key',
        'authenticated',
        'expires_at',
        'last_activity_at',
    ];
}
