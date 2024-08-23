<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Uncomment this if your primary key is not `id` and auto-incrementing.
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'nama', 'username', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function routeNotificationForTelegram()
{
    // Ganti 'YOUR_CHAT_ID' dengan ID chat atau ID grup Telegram yang sesuai
    return '639590150';
}
}
