<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        $data['title'] = 'Kelola Barang';
        $data['barang'] = DB::select('select * from barang');
        // $token = session('access_token');
        // $response = Http::withToken("$token")->get('http://plavon.com/api/barang');

        // $body = $response->getBody();
        // $data['barang'] = json_decode($body,true);
        // $data['barang'] = $data['barang']['data'];
        return view('backend.dashboard.index', $data);
    }
    public function detailBarang($id)
    {
        $data['barang'] = DB::table('barang')->where('id', $id)->first();
        return view('backend.dashboard.detailBarang', $data);
    }
}
