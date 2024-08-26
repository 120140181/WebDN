<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak sesuai dengan penamaan konvensi Laravel
    protected $table = 'history';

    // Tentukan primary key jika tidak menggunakan 'id'
    protected $primaryKey = 'id';

    // Jika tabel tidak menggunakan timestamp, set ke false
    public $timestamps = true;

    // Tentukan atribut yang dapat diisi massal
    protected $fillable = [
        'nama_nasabah',
        'nomor_kwitansi',
        'status_pembayaran',
        'keterangan',
        'tanggal_tagihan',
    ];

    // Jika tanggal tidak dalam format default, tambahkan cast
    protected $casts = [
        'tanggal_tagihan' => 'datetime', // Ubah sesuai format tanggal Anda
    ];
}
