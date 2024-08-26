<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RemindersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reminders')->truncate(); // Clear the table before seeding

        for ($i = 1; $i <= 15; $i++) {
            DB::table('reminders')->insert([
                'nama_nasabah' => 'Nasabah ' . $i,
                'nomor_kwitansi' => 'KW' . str_pad($i, 6, '0', STR_PAD_LEFT),
                'nominal_tagihan' => (string) (10000000), // Make nominal_tagihan unique
                'status_pembayaran' => 'Pending',
                'keterangan' => 'Keterangan ' . $i,
                'tanggal_tagihan' => now()->subDays($i)->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
