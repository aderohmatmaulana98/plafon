<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Distributor;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class DistributorController extends Controller
{
   public function index()
   {
         $data['title'] = 'Kelola Distributor';

         $distributor = DB::table('distributor')
         ->join('count_manager', 'count_manager.id', '=','distributor.count_manager_id')
         ->join('penjab','penjab.id','=','distributor.penjab_id')
         ->join('users','users.id','=','distributor.users_id')
         ->select('users.id','distributor.kode_distributor','distributor.kontak','distributor.alamat','distributor.area','distributor.jumlah_agen',
         'count_manager.nama_cm', 'penjab.nama_penjab','users.full_name','users.email','users.password')
         ->where('users.role_id','=','2')
         ->get();

         

         return view('backend.distributor.index', ['distributor' => $distributor], $data);
   }

   public function add()
    {
        $data['title'] = "Tambah Distributor";
        $cm = DB::table('count_manager')->get();
        $penjab = DB::table('penjab')->get();
        return view('backend.distributor.add', ['cm' => $cm, 'penjab' => $penjab], $data);
    }

    public function edit($id)
    {
        $data['title'] = "Edit Distributor";
        $distributor['distributor'] = DB::table('distributor')->where('id', $id)->first();
        return view('backend.distributor.edit', ['distributor' => $distributor], $data);
    }

   public function detailDistributor($id)
   {
      $data['title'] = 'Detail Distributor';

      $distributor = DB::table('distributor')
         ->join('count_manager', 'distributor.count_manager_id', '=', 'count_manager.id')
         ->join('users', 'distributor.users_id', '=', 'users.id')
         ->join('penjab', 'distributor.penjab_id', '=', 'penjab.id')
         ->select('users.full_name','users.email','users.password','count_manager.nama_cm',
         'penjab.nama_penjab','distributor.*')
         ->where('users.id', '=', $id)
         ->get();
        //  dd($distributor);

      return view('backend.distributor.detail_distributor', ['distributor'=> $distributor], $data);
   }

   public function addDistributor(Request $request)
   {
      $request->validate(

         [  
            'full_name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'reqired',
         ],
         [
             'count_manager_id' => 'required',
             'kode_distributor' => 'required',
             'penjab_id' => 'required',
         ]
      );

      $id_user = rand(000000, 999999);
        $user = [
            'id' =>  $id_user,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => bcrypt('Panorama999'),
            'role_id' => 2,
            'is_active' => 1,
            'created_at' => now(),
        ];

        $distributor = [
            'count_manager_id' => $request->count_manager_id,
            'kode_distributor' => $request->kode_distributor,
            'users_id' => $id_user,
            'penjab_id' => $request->penjab_id,
            'kontak' => $request->kontak,
            'alamat' => $request->alamat,
            'area' => $request->area,
            'jumlah_agen' => $request->jumlah_agen,
            'created_at' => now(),
        ];

        DB::table('users')->insert($user);
        DB::table('distributor')->insert($distributor);

        Alert::success('Data Distributor berhasil ditambah');
        return redirect()
            ->route('distributor');
   }

   public function editDistributor(Request $request, $id)
   {
      
   }

   public function deleteDistributor($id)
   {
     
      DB::beginTransaction();

        try {
            DB::table('users')
                ->where('id', $id)
                ->delete();

            DB::table('distributor')
                ->where('users_id', $id)
                ->delete();

            DB::commit();

            return redirect()
                ->route('distributor');

                Alert::success('Data Distributor berhasil di Hapus');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()
                ->route('distributor');
                Alert::success('error', 'Gagal menghapus data.');
        }
   }
}
