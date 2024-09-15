<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNominalTagihanToRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('reminders', function (Blueprint $table) {
            // Cek apakah kolom 'nominal_tagihan' sudah ada sebelum menambahkannya
            if (!Schema::hasColumn('reminders', 'nominal_tagihan')) {
                $table->integer('nominal_tagihan')->after('nomor_kwitansi');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('reminders', function (Blueprint $table) {
            // Drop kolom hanya jika ada
            if (Schema::hasColumn('reminders', 'nominal_tagihan')) {
                $table->dropColumn('nominal_tagihan');
            }
        });
    }
}

