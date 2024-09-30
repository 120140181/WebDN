<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\ReminderSaved;
use App\Listeners\SendTelegramNotification;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        ReminderSaved::class => [
            SendTelegramNotification::class,
        ],
    ];

    public function boot()
    {
        //
    }
}
