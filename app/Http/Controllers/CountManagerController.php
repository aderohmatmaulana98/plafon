<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CountManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CountManagerController extends Controller
{
    public function index()
    {
        $data['title'] = "Kelola Count Manager";
        $data['cm'] = DB::select('select * from count_manager');
        return view('backend.cm.index', $data);
    }

    public function add()
    {
        $data['title'] = "Tambah Count Manager";
        return view('backend.cm.add', $data);
    }
   public function edit($id)
   {
        $data['title'] = "Edit Count Manager";
        $data['cm'] = DB::table('count_manager')->where('id', $id)->first();
        return view('backend.cm.edit', $data);
   }

    public function addCM(Request $request)
    {
        DB::table('count_manager')->insert([
            'nama_cm' => $request->nama_cm,
            'created_at' => now(),
        ]);

        Alert::success('Data berhasil ditambah');
        return redirect()
            ->route('cm');
    }

    public function editCM(Request $request, $id)
    {
        // Validasi request
        $request->validate([
            'nama_cm' => 'required',
        ]);

         // Cari item berdasarkan id
        $cm = CountManager::find($id);

        // Jika item tidak ditemukan, kembalikan response error 404
        if (!$cm) {
            return response()->json([
                'message' => 'Data not found'
            ], 404);
        }

        // Update data count manager

            $cm->nama_cm = $request->nama_cm;
            $cm->updated_at = now();

            $cm->save();

        Alert::success('Data berhasil diedit');
        return redirect()
            ->route('cm');
    }

    public function deleteCM($id)
    {
        $data = CountManager::findOrFail($id); // mencari data dengan id yang diberikan, dan menampilkan error jika tidak ditemukan
        $data->delete(); // menghapus data

        Alert::success('Data berhasil dihapus');
        return redirect() 
            ->route('cm');
    }
}
