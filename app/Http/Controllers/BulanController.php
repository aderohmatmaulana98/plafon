<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class BulanController extends Controller
{
    public function index()
    {
        $data['title'] = "Kelola Bulan";
        $data['bulan'] = DB::select('select * from bulan');
        return view('backend.bulan.index', $data);
    }

    public function add()
    {
        $data['title'] = "Tambah Bulan";
        return view('backend.bulan.add', $data);
    }
   public function edit($id)
   {
        $data['title'] = "Edit Bulan";
        $data['bulan'] = DB::table('bulan')->where('id', $id)->first();
        return view('backend.bulan.edit', $data);
   }

    public function addBulan(Request $request)
    {
        DB::table('bulan')->insert([
            'nama_bulan' => $request->nama_bulan,
            'created_at' => now(),
        ]);

        Alert::success('Data berhasil ditambah');
        return redirect()
            ->route('bulan');
    }

    public function editBulan(Request $request, $id)
    {
        // Validasi request
        $request->validate([
            'nama_bulan' => 'required',
        ]);

         // Cari item berdasarkan id
        $bulan = Bulan::find($id);

        // Jika item tidak ditemukan, kembalikan response error 404
        if (!$bulan) {
            return response()->json([
                'message' => 'Data not found'
            ], 404);
        }

        // Update data bulan
            $bulan->nama_bulan = $request->nama_bulan;
            $bulan->updated_at = now();

            $bulan->save();

        Alert::success('Data berhasil diedit');
        return redirect()
            ->route('bulan');
    }

    public function deleteBulan($id)
    {
        $data = Bulan::findOrFail($id); // mencari data dengan id yang diberikan, dan menampilkan error jika tidak ditemukan
        $data->delete(); // menghapus data

        Alert::success('Data berhasil dihapus');
        return redirect() 
            ->route('bulan');
    }
}
