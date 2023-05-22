<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang'; //nama tabel pada database

    protected $fillable = [ //kolom yang diizinkan diisi secara massal
        'id',
        'user_id',
        'nama_barang',
        'jenis',
        'stok',
        'harga',
        'ukuran',
        'image',
        'slug',
        'deskripsi',
    ];
}
