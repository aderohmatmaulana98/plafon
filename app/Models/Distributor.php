<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use HasFactory;

    protected $table = 'distributor'; //nama tabel pada database

    protected $fillable = [ //kolom yang diizinkan diisi secara massal
        'id',
        'count_manager_id',
        'kode_distributor',
        'users_id',
        'penjab_id',
        'kontak',
        'alamat',
        'area',
        'jumlah_agen',
    ];

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class, 'distributor_id', 'id');
    }
}
