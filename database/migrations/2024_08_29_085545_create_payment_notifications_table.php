<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('payment_notifications', function (Blueprint $table) {
            $table->id();
            $table->string('nama_nasabah');
            $table->string('nomor_kwitansi');
            $table->decimal('nominal_tagihan', 15, 2);
            $table->date('tanggal_tagihan');
            $table->string('status_pembayaran');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payment_notifications');
    }
};
