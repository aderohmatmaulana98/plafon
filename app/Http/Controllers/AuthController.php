<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
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
            
            if(isset($data['data'])){
                session(['access_token' => $data['data']]);
                return redirect()->route('index');
            }else{
                return redirect()->back();
            }
    }
    public function showForget()
    {
        return view('backend.auth.forgot_password');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );
    
        if ($response === Password::RESET_LINK_SENT) {
            return back()->with('status', 'Email reset password telah dikirim.');
        }
    
        return back()->withErrors(['email' => 'Gagal mengirim email reset password.']);
    }
    
    protected function broker()
    {
        return Password::broker();
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
