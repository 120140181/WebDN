<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        Commands\SendTelegramNotification::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        // Menjadwalkan command SendTelegramNotification untuk dijalankan setiap menit untuk pengujian
        $schedule->command('telegram:send')->everyMinute();

        // Menjalankan queue worker setiap menit
        $schedule->command('queue:work --sleep=3 --tries=3')->everyMinute();
    }

    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}