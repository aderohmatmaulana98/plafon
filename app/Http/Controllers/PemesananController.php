<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

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

    public function showBarang()
    {
        $data['title'] = 'Katalog barang';
        $token = session('access_token');
        
        $response = Http::withToken("$token")->get('http://plavon.dlhcode.com/api/barang');

        $body = $response->getBody();
        $data['barang'] = json_decode($body,true);
        $data['barang'] = $data['barang']['data'];
        
        return view('backend.bos.barang', $data);
    }
}
