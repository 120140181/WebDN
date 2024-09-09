<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nama' => 'Admin Keuangan',
            'username' => 'keuangandn01',
            'password' => Hash::make('adminkeuangan@dn1'),
            'terakhir_login' => null, // Jika belum login, bisa null
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
