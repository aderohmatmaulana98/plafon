<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    public function index()
    {
        $data['title'] = "Role";
        $data['role'] = DB::select('select * from role');
        return view('backend.role.index', $data);
    }

    public function add()
    {
        $data['title'] = "Tambah Role";
        return view('backend.role.add', $data);
    }
    public function edit($id)
    {
        $data['title'] = "Edit Role";
        $data['role'] = DB::table('role')->where('id', $id)->first();
        return view('backend.role.edit', $data);
    }

    public function addRole(Request $request)
    {
        DB::table('role')->insert([
            'role' => $request->role,
            'created_at' => now(),
        ]);

        Alert::success('Role berhasil ditambah');
        return redirect()
            ->route('role');
    }

    public function editRole(Request $request, $id)
    {
        // Validasi request
        $request->validate([
            'role' => 'required',
        ]);

         // Cari item berdasarkan id
        $role = Role::find($id);

        // Jika item tidak ditemukan, kembalikan response error 404
        if (!$role) {
            return response()->json([
                'message' => 'Data not found'
            ], 404);
        }

        // Update data role
            $role->role = $request->role;
            $role->updated_at = now();

            $role->save();

            //dd($role);
          
        Alert::success('Role berhasil diedit');
        return redirect()
            ->route('role');
    }

    public function deleteRole($id)
    {
        DB::table('role')
            ->where('id', $id)
            ->delete();

        Alert::success('Role berhasil dihapus');
        return redirect() 
            ->route('role');
    }
}
