<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function create(Request $request){

        $request->validate([
            'nama'=>'required',
            'email'=>'required|unique:users,email',
            'password' => 'required',
        ],[
            'nama.required' => 'Nama tidak boleh kosong!',
            'email.required' => 'Email tidak boleh kosong!',
            'email.unique' => 'Email sudah terdaftar!',
            'password.required' => 'Password tidak boleh kosong!'
        ]);

        $data = [
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2
        ];

        User::create($data);

        return redirect()->to('login')->with('success', 'Akun berhasil di buat!');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        
        if (Auth::attempt($credentials)) {
            if(Auth::user()->role_id === 1){
                return redirect()->intended('home-admin');
            }else{
                return redirect()->intended('/');
            }
        }

        return redirect()->back()->withErrors([
            'email' => 'Email atau password tidak cocok.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
