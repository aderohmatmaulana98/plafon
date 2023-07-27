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
    public function index()
    {
        $title['title'] = "Penjualan";

        $penjualan = DB::table('penjualan')
        ->join('distributor', 'distributor.id', '=' , 'penjualan.distributor_id')
        ->join('count_manager', 'count_manager.id', '=', 'distributor.count_manager_id')
        ->join('users','users.id','=','distributor.users_id')
        ->select('penjualan.*', 'distributor.count_manager_id','distributor.kode_distributor',
          'distributor.area','users.full_name','count_manager.nama_cm')
        ->get();

        //dd($penjualan);

        return view('backend.penjualan.index', ['penjualan' => $penjualan] , $title);
    }

    public function add()
    {
        $data['title'] = "Tambah Penjualan";
        $data1 = DB::table('distributor')
        ->join('users','users.id','=','distributor.users_id')
        ->select('distributor.id','distributor.count_manager_id','distributor.kode_distributor',
          'distributor.area','users.full_name')
        ->get();
        return view('backend.penjualan.add',['distributor' => $data1], $data);
    }

    public function addPenjualan(Request $request)
    {
        $validatedData = $request->validate([
            'distributor_id' => 'required',
        ]);

        $input = $request->only(['distributor_id', 'nilai1', 'nilai2', 'nilai3', 'nilai4', 'nilai5', 'nilai6', 'nilai7', 'nilai8', 'nilai9', 'nilai10', 'nilai11', 'nilai12']);
        $input['total'] = array_sum($input);

        Penjualan::create($input);

        Alert::success('Data Penjualan berhasil ditambah');
        return redirect()
            ->route('penjualan');
    }

    public function edit($id)
    {
        $data['title'] = "Edit Data Penjualan";
        $data['penjualan'] = DB::table('penjualan')->where('id', $id)->first();

        $penjualan1 = DB::table('distributor')
        ->join('users','users.id','=','distributor.users_id')
        ->select('distributor.id','distributor.count_manager_id','distributor.kode_distributor',
          'distributor.area','users.full_name')
        ->get();

        return view('backend.penjualan.edit', ['penjualan1' => $penjualan1], $data);
    }

    public function editPenjualan(Request $request, $id)
    {
            // Validasi request
        $request->validate([
            'distributor_id' => 'required',
            'nilai1' => 'nullable|numeric',
            'nilai2' => 'nullable|numeric',
            'nilai3' => 'nullable|numeric',
            'nilai4' => 'nullable|numeric',
            'nilai5' => 'nullable|numeric',
            'nilai6' => 'nullable|numeric',
            'nilai7' => 'nullable|numeric',
            'nilai8' => 'nullable|numeric',
            'nilai9' => 'nullable|numeric',
            'nilai10' => 'nullable|numeric',
            'nilai11' => 'nullable|numeric',
            'nilai12' => 'nullable|numeric',
            
        ]);

        // Cari item penjualan berdasarkan id
        $penjualan = Penjualan::find($id);

        // Jika item penjualan tidak ditemukan, kembalikan response error 404
        if (!$penjualan) {
            return response()->json([
                'message' => 'Data not found'
            ], 404);
        }

        // Update data penjualan
        $input = $request->only(['distributor_id', 'nilai1', 'nilai2', 'nilai3', 'nilai4', 'nilai5', 'nilai6', 'nilai7', 'nilai8', 'nilai9', 'nilai10', 'nilai11', 'nilai12']);

        // Hitung total dari nilai-nilai yang memiliki nilai numerik (tidak null)
        $input['total'] = 0;
        for ($i = 1; $i <= 12; $i++) {
            if (isset($input['nilai'.$i]) && is_numeric($input['nilai'.$i])) {
                $input['total'] += $input['nilai'.$i];
            }
        }

        // Update data penjualan dengan data baru
        $penjualan->update($input);

        Alert::success('Data berhasil diedit');
        return redirect()->route('penjualan');
    }

    public function delete_penjualan($id)
    {
        DB::table('penjualan')
            ->where('id', $id)
            ->delete();

        Alert::success('Data Penjualan berhasil dihapus');
        return redirect() 
            ->route('penjualan');
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
