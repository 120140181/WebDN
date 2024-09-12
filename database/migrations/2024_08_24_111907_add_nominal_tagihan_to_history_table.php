<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNominalTagihanToHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('history', function (Blueprint $table) {
            // Cek apakah kolom 'nominal_tagihan' sudah ada sebelum menambahkannya
            if (!Schema::hasColumn('history', 'nominal_tagihan')) {
                $table->decimal('nominal_tagihan', 10, 2)->nullable(); // Menambahkan kolom nominal_tagihan
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
        Schema::table('history', function (Blueprint $table) {
            // Cek apakah kolom 'nominal_tagihan' ada sebelum menghapusnya
            if (Schema::hasColumn('history', 'nominal_tagihan')) {
                $table->dropColumn('nominal_tagihan'); // Menghapus kolom nominal_tagihan jika rollback
            }
        });
    }
}

