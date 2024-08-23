<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RemindersTableSeeder extends Seeder
{
    /**
     * Seed the reminders table with 20 dummy records.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reminders')->truncate(); // Clear the table before seeding

        for ($i = 1; $i <= 20; $i++) {
            DB::table('reminders')->insert([
                'nama_nasabah' => 'Nasabah ' . $i,
                'nomor_kwitansi' => 'KW' . str_pad($i, 6, '0', STR_PAD_LEFT),
                'status_pembayaran' => $i % 2 == 0 ? 'Lunas' : 'Belum Lunas',
                'keterangan' => 'Keterangan ' . $i,
                'tanggal_tagihan' => now()->subDays($i)->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}




