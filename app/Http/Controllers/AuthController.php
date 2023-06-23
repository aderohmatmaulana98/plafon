<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('backend.auth.login');
    }
    public function login_action(Request $request)
    {
        $client = new Client();
        $response = $client->request('POST','http://plavon.dlhcode.com/api/login',[
            'form_params' =>[
                'email' => $request->email,
                'password' => $request->password,

            ]
            ]);
            $body = $response->getbody();
            $data = json_decode($body, true);
            
            if (isset($data['data'])) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $session = User::where('email', $request->email)->first();
                // dd($session);
                Session::put('name', $session->name);
                $request->session()->regenerate();
            }

            session(['access_token' => $data['data']]);
            return redirect()->route('index');
        } else {
            return redirect()->back();
        }
    }

    public function showchangePassword()
    {   
        $data['title'] = 'Ganti Password';

        return view('backend.auth.change_password', $data);
    }

    public function changePassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        // Mendapatkan data pengguna yang sedang terautentikasi
        $user = Auth::user();

        // Memeriksa apakah password saat ini sesuai
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()
            ->route('showchange.password')
            ->with('danger', 'Password saat ini tidak cocok.');
        }

        // Mengubah password pengguna
        $user->password = Hash::make($request->new_password);
        $user->save();
        
        return redirect()
            ->route('showchange.password')
            ->with('success', 'Password berhasil diperbarui.');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
