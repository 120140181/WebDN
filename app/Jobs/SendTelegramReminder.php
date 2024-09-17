<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Telegram\Bot\Api;

class SendTelegramReminder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $reminder;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($reminder)
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
        $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));

        $message = "Reminder Pembayaran: \n".
                   "Nama Nasabah: {$this->reminder->nama_nasabah}\n".
                   "Nomor Kwitansi: {$this->reminder->nomor_kwitansi}\n".
                   "Nominal Tagihan: {$this->reminder->nominal_tagihan}\n".
                   "Status Pembayaran: {$this->reminder->status_pembayaran}\n".
                   "Tanggal Tagihan: {$this->reminder->tanggal_tagihan}";

        $telegram->sendMessage([
            'chat_id' => env('TELEGRAM_CHAT_ID'),
            'text' => $message
        ]);
    }
}
