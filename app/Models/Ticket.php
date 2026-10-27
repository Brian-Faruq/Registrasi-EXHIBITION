<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    // Tambahkan baris ini untuk mengizinkan kolom-kolom diisi
    protected $fillable = [
        'nama_paket',
        'harga',
    ];
}