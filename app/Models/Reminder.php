<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak mengikuti konvensi Laravel
    protected $table = 'reminders';

    // Tentukan primary key tabel
    protected $primaryKey = 'id';

    // Tentukan apakah primary key adalah auto increment
    public $incrementing = true;

    // Tentukan apakah tabel menggunakan timestamp
    public $timestamps = true;

    // Tentukan atribut yang bisa diisi massal
    protected $fillable = [
        'nama_nasabah',
        'nomor_kwitansi',
        'nominal_tagihan',
        'status_pembayaran',
        'keterangan',
        'tanggal_tagihan',
    ];

    // Jika Anda memiliki atribut yang tidak bisa diisi massal, gunakan $guarded
    // protected $guarded = [];
}
