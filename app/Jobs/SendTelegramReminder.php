<?php
// File: app/Jobs/SendTelegramReminder.php

namespace App\Jobs;

use App\Models\Reminder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Telegram\Bot\Api;
use Illuminate\Support\Facades\Log;

class SendTelegramReminder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $reminder;

    /**
     * Create a new job instance.
     */
    public function __construct(Reminder $reminder)
    {
        $this->reminder = $reminder;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info('SendTelegramReminder job started for reminder ID: ' . $this->reminder->id);

        $telegram = new Api(env('TELEGRAM_BOT_TOKEN', 'default_token'));

        // Menyiapkan pesan dengan data reminder
        $message = "Reminder Pembayaran: \n".
                   "Nama Nasabah: {$this->reminder->nama_nasabah}\n".
                   "Nomor Kwitansi: {$this->reminder->nomor_kwitansi}\n".
                   "Nominal Tagihan: {$this->reminder->nominal_tagihan}\n".
                   "Status Pembayaran: {$this->reminder->status_pembayaran}\n".
                   "Tanggal Tagihan: {$this->reminder->tanggal_tagihan}";

        // Mengirim pesan ke Telegram
        $telegram->sendMessage([
            'chat_id' => env('TELEGRAM_CHAT_ID', 'default_chat_id'),
            'text' => $message
        ]);

        Log::info('SendTelegramReminder job completed for reminder ID: ' . $this->reminder->id);
    }
}