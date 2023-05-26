<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

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
           
        ]);

         // Cari item berdasarkan id
        $penjualan = Penjualan::find($id);

        // Jika item tidak ditemukan, kembalikan response error 404
        if (!$penjualan) {
            return response()->json([
                'message' => 'Data not found'
            ], 404);
        }

        // Update data count manager

            $penjualan->distributor_id = $request->distributor_id;
            $penjualan->updated_at = now();

            $penjualan->save();

        Alert::success('Data berhasil diedit');
        return redirect()
            ->route('penjualan');
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
}
