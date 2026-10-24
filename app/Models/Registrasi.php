<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'paket_id',
        'kamar_id',
        'kode_unik',
        'nama_orang_tua',
        'nama_santri',
        'no_whatsapp',
        'total_anggota',
        'rincian_anggota',
        'total_bayar',
        'status_pembayaran',
        'status_checkin',
        'reference',
        'payment_method',
        'checkout_url',
    ];

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }
}