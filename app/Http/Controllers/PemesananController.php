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
        $data['pemesanan'] = DB::select('select * from pemesanan');
        return view('backend.distributor.pemesanan', $data);
    }
    
}
