<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';
    protected $fillable =[

        'distributor_id',
        'total_pembelian',
        'total',
        'retur',
    ];

    protected $casts = [
        'total_pembelian' => 'array',
    ];

    public function distributor()
    {
        return $this->belongsTo(Distributor::class);
    }
}
