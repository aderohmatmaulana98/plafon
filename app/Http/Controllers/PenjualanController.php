<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PenjualanExport;

class PenjualanController extends Controller
{
    public function index(Request $request)
    {
        $title = "Penjualan";

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

    return view('backend.penjualan.index', compact('title', 'penjualan', 'total_penjualan', 'availableMonths', 'selectedMonth'));
    }

    // public function add()
    // {
    //     $data['title'] = "Tambah Penjualan";
    //     $data1 = DB::table('distributor')
    //     ->join('users','users.id','=','distributor.users_id')
    //     ->select('distributor.id','distributor.penjab_id','distributor.kode_distributor',
    //       'distributor.area','users.full_name')
    //     ->get();
        
    //     return view('backend.penjualan.add',['distributor' => $data1], $data);
    // }

    // public function addPenjualan(Request $request)
    // {
       

    //     $penjualan = DB::table('pemesanan')
    //     ->join('users','users.id', '=', 'pemesanan.id_user')
    //     ->join('distributor','users.id', '=', 'distributor.users_id')
    //     ->join('penjab','penjab.id', '=', 'distributor.penjab_id')
    //     ->where(DB::raw("DATE_FORMAT(pemesanan.created_at, '%Y-%m')"), '=', '2023-11')
    //     ->where('status', 'lunas')
    //     ->groupBy('users.id')
    //     ->select('penjab.nama_penjab','users.full_name', DB::raw('SUM(harga) as jumlah_harga'))
    //     ->get();
    //     // $distributorJanuari = DB::table('distributor')
    //     //                         ->join('users', 'users.id', '=', 'distributor.id_user')
    //     //                         ->where('distributor.id_user', '')

    //     $input = $request->only(['distributor_id', 'nilai1', 'nilai2', 'nilai3', 'nilai4', 'nilai5', 'nilai6', 'nilai7', 'nilai8', 'nilai9', 'nilai10', 'nilai11', 'nilai12']);
    //     $input['total'] = array_sum($input);

    //     Penjualan::create($input);

    //     Alert::success('Data Penjualan berhasil ditambah');
    //     return redirect()
    //         ->route('penjualan');
    // }

    // public function edit($id)
    // {
    //     $data['title'] = "Edit Data Penjualan";
    //     $data['penjualan'] = DB::table('penjualan')->where('id', $id)->first();

    //     $penjualan1 = DB::table('distributor')
    //     ->join('users','users.id','=','distributor.users_id')
    //     ->select('distributor.id','distributor.count_manager_id','distributor.kode_distributor',
    //       'distributor.area','users.full_name')
    //     ->get();

    //     return view('backend.penjualan.edit', ['penjualan1' => $penjualan1], $data);
    // }

    // public function editPenjualan(Request $request, $id)
    // {
    //         // Validasi request
    //     $request->validate([
    //         'distributor_id' => 'required',
    //         'nilai1' => 'nullable|numeric',
    //         'nilai2' => 'nullable|numeric',
    //         'nilai3' => 'nullable|numeric',
    //         'nilai4' => 'nullable|numeric',
    //         'nilai5' => 'nullable|numeric',
    //         'nilai6' => 'nullable|numeric',
    //         'nilai7' => 'nullable|numeric',
    //         'nilai8' => 'nullable|numeric',
    //         'nilai9' => 'nullable|numeric',
    //         'nilai10' => 'nullable|numeric',
    //         'nilai11' => 'nullable|numeric',
    //         'nilai12' => 'nullable|numeric',
            
    //     ]);

    //     // Cari item penjualan berdasarkan id
    //     $penjualan = Penjualan::find($id);

    //     // Jika item penjualan tidak ditemukan, kembalikan response error 404
    //     if (!$penjualan) {
    //         return response()->json([
    //             'message' => 'Data not found'
    //         ], 404);
    //     }

    //     // Update data penjualan
    //     $input = $request->only(['distributor_id', 'nilai1', 'nilai2', 'nilai3', 'nilai4', 'nilai5', 'nilai6', 'nilai7', 'nilai8', 'nilai9', 'nilai10', 'nilai11', 'nilai12']);

    //     // Hitung total dari nilai-nilai yang memiliki nilai numerik (tidak null)
    //     $input['total'] = 0;
    //     for ($i = 1; $i <= 12; $i++) {
    //         if (isset($input['nilai'.$i]) && is_numeric($input['nilai'.$i])) {
    //             $input['total'] += $input['nilai'.$i];
    //         }
    //     }

    //     // Update data penjualan dengan data baru
    //     $penjualan->update($input);

    //     Alert::success('Data berhasil diedit');
    //     return redirect()->route('penjualan');
    // }

    // public function delete_penjualan($id)
    // {
    //     DB::table('penjualan')
    //         ->where('id', $id)
    //         ->delete();

    //     Alert::success('Data Penjualan berhasil dihapus');
    //     return redirect() 
    //         ->route('penjualan');
    // }

    public function downloadExcel(Request $request)
    {
        // Query data dari database
        $filterMonth = $request->input('filter_month', date('Y-m'));
        $penjualan = DB::table('penjualan')
        ->join('distributor', 'distributor.id', '=' , 'penjualan.distributor_id')
        ->join('penjab', 'penjab.id', '=', 'distributor.penjab_id')
        ->join('users','users.id','=','distributor.users_id')
        ->select('penjualan.*', 'distributor.penjab_id','distributor.kode_distributor',
          'distributor.area','users.full_name','penjab.nama_penjab')
        ->get();

        // Export data ke file Excel
        return Excel::download(new PenjualanExport($filterMonth), 'rekap_data_penjualan.xlsx');
    }
}
