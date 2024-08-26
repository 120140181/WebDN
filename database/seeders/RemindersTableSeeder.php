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
                'nama_nasabah' => $faker->name,
                'nomor_kwitansi' => $faker->unique()->numerify('KW-####'),
                'nominal_tagihan' => $faker->numberBetween(1000000, 50000000),
                'status_pembayaran' => $faker->randomElement(['Lunas', 'Belum Lunas', 'Cancel']),
                'keterangan' => $faker->sentence,
                'tanggal_tagihan' => $faker->date,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}




