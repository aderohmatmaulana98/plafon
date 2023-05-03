<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Penjab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PenjabController extends Controller
{
    public function index()
    {
        $data['title'] = "Kelola Penanggung Jawab";
        $data['penjab'] = DB::select('select * from penjab');
        return view('backend.penjab.index', $data);
    }

    public function add()
    {
        $data['title'] = "Tambah Penanggung Jawab";
        return view('backend.penjab.add', $data);
    }
    public function edit($id)
    {
        $data['title'] = "Edit Penanggung Jawab";
        $data['penjab'] = DB::table('penjab')->where('id', $id)->first();
        return view('backend.penjab.edit', $data);
    }

    public function addPenjab(Request $request)
    {
        DB::table('penjab')->insert([
            'nama_penjab' => $request->nama_penjab,
            'created_at' => now(),
        ]);

        Alert::success('Data berhasil ditambah');
        return redirect()
            ->route('penjab');
    }

    public function editPenjab(Request $request, $id)
    {
        // Validasi request
        $request->validate([
            'nama_penjab' => 'required',
        ]);

         // Cari item berdasarkan id
        $penjab = Penjab::find($id);

        // Jika item tidak ditemukan, kembalikan response error 404
        if (!$penjab) {
            return response()->json([
                'message' => 'Data not found'
            ], 404);
        }

        // Update data penjab
            $penjab->nama_penjab = $request->nama_penjab;
            $penjab->updated_at = now();

            $penjab->save();

          
        Alert::success('Data berhasil diedit');
        return redirect()
            ->route('penjab');
    }

    public function deletePenjab($id)
    {
        $data = Penjab::findOrFail($id); // mencari data dengan id yang diberikan, dan menampilkan error jika tidak ditemukan
        $data->delete(); // menghapus data

        Alert::success('Data berhasil dihapus');
        return redirect() 
            ->route('penjab');
    }
}
