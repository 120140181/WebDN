<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Notifications\TelegramNotification;
use App\Models\User;

class SendTelegramNotification extends Command
{
    protected $signature = 'telegram:send';
    protected $description = 'Send Telegram notifications';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $users = User::all(); // atau filter sesuai kebutuhan
        foreach ($users as $user) {
            $user->notify(new TelegramNotification('This is a test message from Laravel.'));
        }
        $this->info('Telegram notifications sent successfully.');
    }
}

