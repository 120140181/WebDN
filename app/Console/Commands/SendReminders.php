<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Reminder;
use App\Notifications\TelegramNotification;
use Illuminate\Support\Facades\Notification;

class SendReminders extends Command
{
    protected $signature = 'send:reminders';
    protected $description = 'Send reminders to users';

    public function handle()
    {
        $reminders = Reminder::where('sent', false)->get();

        foreach ($reminders as $reminder) {
            $user = User::find($reminder->user_id); // Pastikan Anda memiliki model User
            Notification::send($user, new TelegramNotification($reminder->message));

            $reminder->update(['sent' => true]);
        }

        $this->info('Reminders sent successfully!');
    }
}