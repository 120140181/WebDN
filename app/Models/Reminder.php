<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Reminder extends Model
{
    use HasFactory;

    protected $table = 'reminders';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'nama_nasabah',
        'nomor_kwitansi',
        'nominal_tagihan',
        'status_pembayaran',
        'keterangan',
        'tanggal_tagihan',
        'user_id', // Pastikan kolom user_id ada di tabel reminders
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($reminder) {
            if (Auth::check()) {
                $reminder->user_id = Auth::id();
            }
        });
    }
}