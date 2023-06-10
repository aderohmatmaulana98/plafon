<?php

namespace App\Http\Controllers;

use App\Exports\PenjualanExport;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function index()
    {
        $data['title'] = 'Kelola Barang';
        $pesananCount = DB::table('pemesanan')->where('status', 'lunas')->count();
        $pesanan1Count = DB::table('pemesanan')->where('status', 'belum bayar')->count();
        $totalLunas = DB::table('pemesanan')->where('status', 'lunas')->sum('harga');
        
        return view('backend.dashboard.index',compact('pesananCount','pesanan1Count','totalLunas'), $data);
    }
    public function detailBarang($id)
    {
        $data['barang'] = DB::table('barang')->where('id', $id)->first();
        return view('backend.dashboard.detailBarang', $data);
    }

    public function penjualan()
    {
        $title['title'] = " Rekap Penjualan";

        $penjualan = DB::table('penjualan')
        ->join('distributor', 'distributor.id', '=' , 'penjualan.distributor_id')
        ->join('count_manager', 'count_manager.id', '=', 'distributor.count_manager_id')
        ->join('users','users.id','=','distributor.users_id')
        ->select('penjualan.*', 'distributor.count_manager_id','distributor.kode_distributor',
          'distributor.area','users.full_name','count_manager.nama_cm')
        ->get();

        return view('backend.bos.index', ['penjualan' => $penjualan] , $title);
    }

    public function downloadExcel()
    {
        // Query data dari database
        $penjualan = DB::table('penjualan')
        ->join('distributor', 'distributor.id', '=' , 'penjualan.distributor_id')
        ->join('count_manager', 'count_manager.id', '=', 'distributor.count_manager_id')
        ->join('users','users.id','=','distributor.users_id')
        ->select('penjualan.*', 'distributor.count_manager_id','distributor.kode_distributor',
          'distributor.area','users.full_name','count_manager.nama_cm')
        ->get();

        // Export data ke file Excel
        return Excel::download(new PenjualanExport($penjualan), 'rekap_data_penjualan.xlsx');
    }
}
