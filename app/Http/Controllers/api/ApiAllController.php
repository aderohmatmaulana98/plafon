<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ApiAllController extends Controller
{
    public function barang()
    {
        $barang = DB::select('select * from barang');
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditampilkan',
            'data' => $barang
        ]);
    }
}
