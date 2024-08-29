<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Telegram\Bot\Api;

class PaymentNotification extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_nasabah',
        'nomor_kwitansi',
        'nominal_tagihan',
        'tanggal_tagihan',
        'status_pembayaran',
        'keterangan',
    ];

    public function sendTelegramNotification()
    {
        $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));

        $message = "Reminder Tagihan\n";
        $message .= "Nama Nasabah: {$this->nama_nasabah}\n";
        $message .= "Nomor Kwitansi: {$this->nomor_kwitansi}\n";
        $message .= "Nominal Tagihan: Rp. " . number_format($this->nominal_tagihan, 0, ',', '.') . "\n";
        $message .= "Tanggal Tagihan: " . date('d-m-Y', strtotime($this->tanggal_tagihan)) . "\n";
        $message .= "Status Pembayaran: {$this->status_pembayaran}\n";
        $message .= "Keterangan: {$this->keterangan}\n";

        $telegram->sendMessage([
            'chat_id' => env('TELEGRAM_CHAT_ID'),
            'text' => $message
        ]);
    }
}
