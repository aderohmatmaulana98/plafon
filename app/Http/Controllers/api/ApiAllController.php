<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class ApiAllController extends Controller
{
    public function barang()
    {
        $barang = DB::table('barang')
        ->join('users','users.id','=','barang.user_id')
        ->select('barang.*','users.id')
        ->get();
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditampilkan',
            'data' => $barang
        ]);
    }


    public function get_barang_by_id(Request $request)
    {
        $barang = DB::select("select * from barang where id = '$request->id'");

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditampilkan',
            'data' => $barang
        ]);
    }

    public function pemesanan()
    {
        $pemesanan = DB::table('pemesanan')
        ->join('barang','barang.id','=','pemesanan.id_barang')
        ->select('pemesanan.*','barang.nama_barang','barang.jenis','barang.harga','barang.ukuran')
        ->get();
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditampilkan',
            'data' => $pemesanan
        ]);
    }

    public function tambah_pemesanan(Request $request)
    {
        $validate = $request->validate([
            'id_user' => 'required',
            'id_barang' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'status' => 'required',
            'order_id' => 'required',
        ]);
        $id_barang = $request->id_barang;
        $barang = DB::table('barang')
        ->where('id', '=', 3)
        ->select('barang.stok', 'barang.harga')
        ->get();
        $jumlah_pesanan = $request->jumlah;
       
        $pengurangan_stok = $barang[0]->stok - (int)$jumlah_pesanan;
        $total_harga = (int)$jumlah_pesanan * $barang[0]->harga;
        
        if ($pengurangan_stok < 0) {
            return response()->json([
                'success' => true,
                'message' => 'Stok telah habis'
            ], Response::HTTP_OK);
        }else {
        
        $pemesanan = DB::table('pemesanan')->insert([

                'id_user' => $request->id_user,
                'id_barang' => $request->id_barang,
                'jumlah' => $total_harga,
                'harga' => $request->harga,
                'status' => $request->status,
                'order_id' => $request->order_id,
                'created_at' => now()
            ]);

            $affected = DB::table('barang')
            ->where('id', $id_barang)
            ->update(['stok' => $pengurangan_stok]);

            return response()->json([
                'success' => true,
                'message' => 'Data Pemesanan berhasil ditambah',
                'data' => $pemesanan
            ], Response::HTTP_OK);
        }
    }

    public function delete_pemesanan($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->delete();
        return response()->json([
            'success' => true,
            'message' => 'Role berhasil dihapus',
            'data' => $pemesanan
        ]);
    }
    public function get_pemesanan_by_id($id)
    {
        $get_pemesanan_by_id = DB::table('pemesanan')
        ->join('barang','barang.id','=','pemesanan.id_barang')
        ->join('users','users.id','=','pemesanan.id_user')
        ->select('pemesanan.*','barang.nama_barang','barang.jenis','barang.harga','barang.ukuran')
        ->where('users.id', '=', $id)
        ->get();
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditampilkan',
            'data' => $get_pemesanan_by_id
        ]);
    }
}
