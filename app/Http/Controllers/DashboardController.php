<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data['barang'] = DB::select('select * from barang');
        return view('backend.dashboard.index', $data);
    }
    public function detailBarang($id)
    {
        $data['barang'] = DB::table('barang')->where('id', $id)->first();
        return view('backend.dashboard.detailBarang', $data);
    }
}
