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
        $data = Penjualan::with('distributor')->get();
        

        return view('backend.penjualan.index', compact('data') , $title);
    }

    public function add()
    {
        $data['title'] = "Tambah Penjualan";
        $data1 = DB::table('distributor')->get();
        return view('backend.penjualan.add',['distributor' => $data1], $data);
    }

    public function addPenjualan(Request $request)
    {
        $data = [
            'total_pembelian' => json_encode([
                'januari' => $request->input('januari'),
                'februari' => $request->input('februari'),
                'maret' => $request->input('maret'),
                'april' => $request->input('april'),
                'mei' => $request->input('mei')
            ]),
            'distributor_id' => $request->input('distributor_id'),
            'total' => $request->input('total'),
            'retur' => $request->input('retur')
        ];

        Penjualan::create($data);

        Alert::success('Data Penjualan berhasil ditambah');
        return redirect()
            ->route('penjualan');
    }
}
