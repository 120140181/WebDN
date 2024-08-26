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
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            DB::table('reminders')->insert([
                'nama_nasabah' => 'Nasabah ' . $i,
                'nomor_kwitansi' => 'KW' . str_pad($i, 6, '0', STR_PAD_LEFT),
                'nominal_tagihan' => (string) (10000000 + $i), // Make nominal_tagihan unique
                'status_pembayaran' => $i % 2 == 0 ? 'Lunas' : 'Belum Lunas',
                'keterangan' => 'Keterangan ' . $i,
                'tanggal_tagihan' => now()->subDays($i)->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
