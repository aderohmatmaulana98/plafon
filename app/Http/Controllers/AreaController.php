<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AreaController extends Controller
{
    public function index()
    {
        $data['title'] = "Kelola Area";
        $data['area'] = DB::select('select * from area');
        return view('backend.area.index', $data);
    }

    public function add()
    {
        $data['title'] = "Tambah Area";
        return view('backend.area.add', $data);
    }
   public function edit($id)
   {
        $data['title'] = "Edit Area";
        $data['area'] = DB::table('area')->where('id', $id)->first();
        return view('backend.area.edit', $data);
   }

    public function addArea(Request $request)
    {
        DB::table('area')->insert([
            'nama_area' => $request->nama_area,
            'created_at' => now(),
        ]);

        Alert::success('Data berhasil ditambah');
        return redirect()
            ->route('area');
    }

    public function editArea(Request $request, $id)
    {
        // Validasi request
        $request->validate([
            'nama_area' => 'required',
        ]);

         // Cari item berdasarkan id
        $area = Area::find($id);

        // Jika item tidak ditemukan, kembalikan response error 404
        if (!$area) {
            return response()->json([
                'message' => 'Data not found'
            ], 404);
        }

        // Update data area
            $area->nama_area = $request->nama_area;
            $area->updated_at = now();

            $area->save();

          
        Alert::success('Data berhasil diedit');
        return redirect()
            ->route('area');
    }

    public function deleteArea($id)
    {
        $data = Area::findOrFail($id); // mencari data dengan id yang diberikan, dan menampilkan error jika tidak ditemukan
        $data->delete(); // menghapus data

        Alert::success('Data berhasil dihapus');
        return redirect() 
            ->route('area');
    }
}
