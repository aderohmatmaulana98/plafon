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

    public function distributor()
    {
        $distributor = DB::table('distributor')
        ->join('count_manager', 'count_manager.id', '=', 'distributor.count_manager_id')
        ->join('users', 'users.id', '=', 'distributor.users_id')
        ->join('penjab', 'penjab.id', '=', 'distributor.penjab_id')
        ->select('users.full_name','users.email','users.password','count_manager.nama_cm','count_manager.id',
        'penjab.nama_penjab','distributor.*')
        ->where('users.role_id','=','2')
        ->get();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditampilkan',
            'data' => $distributor
        ]);
    }

    public function count_manager()
    {
        $count_manager = DB::select('select * from count_manager');
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditampilkan',
            'data' => $count_manager
        ]);
    }

    public function penjab()
    {
        $penjab = DB::select('select * from penjab');
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditampilkan',
            'data' => $penjab
        ]);
    }

    public function users()
    {
        $users = DB::select('select * from users where role_id = 2');
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditampilkan',
            'data' => $users
        ]);
    }
}
