<?php

namespace App\Http\Controllers;

use App\Exports\PenjualanExport;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $data['title'] = 'Kelola Barang';

        // Get the filter value from the request
        $filterMonthYear = $request->input('filter_month_year', date('Y-m'));

        // Query to get the count of completed orders
        $pesananCount = DB::table('pemesanan')
            ->where('status', 'lunas')
            ->where(DB::raw("DATE_FORMAT(pemesanan.created_at, '%Y-%m')"), '=', $filterMonthYear)
            ->count();

        // Query to get the count of pending orders
        $pesanan1Count = DB::table('pemesanan')
            ->where('status', 'belum bayar')
            ->where(DB::raw("DATE_FORMAT(pemesanan.created_at, '%Y-%m')"), '=', $filterMonthYear)
            ->count();

        // Query to get the total sales
        $totalLunas = DB::table('pemesanan')
            ->where('status', 'lunas')
            ->where(DB::raw("DATE_FORMAT(pemesanan.created_at, '%Y-%m')"), '=', $filterMonthYear)
            ->sum('harga');

        // Additional query for available months in the filter dropdown
        $availableMonths = DB::table('pemesanan')
            ->select(DB::raw("DISTINCT DATE_FORMAT(created_at, '%Y-%m') as month_year"))
            ->get()
            ->pluck('month_year');

        return view('backend.dashboard.index', compact('pesananCount', 'pesanan1Count', 'totalLunas', 'availableMonths', 'filterMonthYear'), $data);
    }
    public function detailBarang($id)
    {
        $data['barang'] = DB::table('barang')->where('id', $id)->first();
        return view('backend.dashboard.detailBarang', $data);
    }

    public function penjualan(Request $request)
    {
        $title = "Rekap Penjualan";

        // Filter default untuk bulan dan tahun saat ini
        $filterMonth = $request->input('filter_month', 'all');
    
        $penjualanQuery = DB::table('pemesanan')
            ->join('users', 'users.id', '=', 'pemesanan.id_user')
            ->join('distributor', 'users.id', '=', 'distributor.users_id')
            ->join('penjab', 'penjab.id', '=', 'distributor.penjab_id')
            ->where('status', 'lunas')
            ->groupBy('users.id');
    
        // Gunakan kondisi tambahan jika filter bukan "All"
        if ($filterMonth != 'all') {
            $penjualanQuery->where(DB::raw("DATE_FORMAT(pemesanan.created_at, '%Y-%m')"), '=', $filterMonth);
        }
    
        $penjualan = $penjualanQuery
            ->select('penjab.nama_penjab', 'users.full_name', 'distributor.area', 'distributor.kode_distributor', DB::raw('SUM(harga) as jumlah_harga'))
            ->get();
    
        $total_penjualanQuery = DB::table('pemesanan')
            ->join('users', 'users.id', '=', 'pemesanan.id_user')
            ->join('distributor', 'users.id', '=', 'distributor.users_id')
            ->join('penjab', 'penjab.id', '=', 'distributor.penjab_id')
            ->where('status', 'lunas');
    
        // Gunakan kondisi tambahan jika filter bukan "All"
        if ($filterMonth != 'all') {
            $total_penjualanQuery->where(DB::raw("DATE_FORMAT(pemesanan.created_at, '%Y-%m')"), '=', $filterMonth);
        }
    
        $total_penjualan = $total_penjualanQuery
            ->select(DB::raw('SUM(harga) as jumlah_harga'))
            ->first();
        $total_penjualan = $total_penjualan->jumlah_harga;
    
        // Dapatkan bulan dan tahun yang tersedia untuk dropdown filter
        $availableMonths = DB::table('pemesanan')
            ->select(DB::raw("DISTINCT DATE_FORMAT(created_at, '%Y-%m') as month"))
            ->get()
            ->pluck('month');
    
        $selectedMonth = $filterMonth;

        return view('backend.bos.index', compact('title', 'penjualan', 'total_penjualan', 'availableMonths', 'selectedMonth'));
    }

    public function downloadExcel()
    {
        // Query data dari database
        $penjualan = DB::table('penjualan')
        ->join('distributor', 'distributor.id', '=' , 'penjualan.distributor_id')
        ->join('penjab', 'penjab.id', '=', 'distributor.penjab_id')
        ->join('users','users.id','=','distributor.users_id')
        ->select('penjualan.*', 'distributor.penjab_id','distributor.kode_distributor',
          'distributor.area','users.full_name','penjab.nama_penjab')
        ->get();

        // Export data ke file Excel
        return Excel::download(new PenjualanExport($penjualan), 'rekap_data_penjualan.xlsx');
    }

    public function profile()
        {   
            $data['title'] = 'My Profile';

            $user = Auth::user();

            return view('backend.auth.profile', ['user' => $user], $data);
        }
}
