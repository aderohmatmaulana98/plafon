<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{
    public function index()
    {
        $data['title'] = "Pemesanan";

        $pemesanan = DB::table('pemesanan')
        ->join('users','pemesanan.id_user','=','users.id')
        ->join('barang','pemesanan.id_barang','=','barang.id')
        ->select('pemesanan.*','barang.*', 'users.*')
        ->get();

        return view('backend.distributor.pemesanan', ['pemesanan' => $pemesanan], $data);
    }
    
}
