<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class PemesananController extends Controller
{
    public function index()
    {
        $data['title'] = "Pemesanan";

        $pemesanan = DB::table('pemesanan')
        ->join('users','pemesanan.id_user','=','users.id')
        ->join('barang','pemesanan.id_barang','=','barang.id')
        ->select('pemesanan.*','barang.nama_barang', 'users.full_name')
        ->get();

        return view('backend.distributor.pemesanan', ['pemesanan' => $pemesanan], $data);
    }

    public function edit($id)
    {
            $data['title'] = "Edit Pemesanan";
            $pemesanan = DB::table('pemesanan')->where('id', $id)->first();
            return view('backend.distributor.edit_pemesanan', compact('pemesanan'), $data);
    }

    public function edit_pemesanan(Request $request, $id)
    {
        // Validasi request
        $request->validate([
            'status_barang' => 'required',
        ]);

        // Cari item berdasarkan id
        $status = Pemesanan::where('id', $id)->first();

        // Jika item tidak ditemukan, kembalikan response error 404
        if (!$status) {
            return response()->json([
                'message' => 'Data not found'
            ], 404);
        }

        // Update data status
        $status->status_barang = $request->status_barang;
        $status->updated_at = now();

        $status->save();

        Alert::success('Data berhasil diedit');
        return redirect()->route('pemesanan');
    }

    public function showBarang()
    {
        $data['title'] = 'Katalog barang';
        $token = session('access_token');

        $response = Http::withToken("$token")->get('http://plavon.dlhcode.com/api/barang');

        $body = $response->getBody();
        $data['barang'] = json_decode($body,true);
        $data['barang'] = $data['barang']['data'];

        return view('backend.bos.barang',$data);
    }
}
