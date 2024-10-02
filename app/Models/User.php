<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'nama',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function routeNotificationForTelegram()
    {
        $chatId = env('TELEGRAM_CHAT_ID', '-4512789673'); // Ganti dengan ID chat yang sesuai
        Log::info('routeNotificationForTelegram returning chat ID: ' . $chatId);
        return $chatId;
    }
}