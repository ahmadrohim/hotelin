<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\User;

class AuthController extends Controller
{
    public function register()
    {
        $title = 'Form Register';
        return view('auth.register', compact('title'));
    }

    // Data Register
    public function store(Request $request)
    {
       $validate = $request->validate([
            'name' => 'required',
            'email' => [
                'required','unique:users','email:dns', Rule::unique('users')->whereNull('deleted_at')
            ],
            'password' => 'required|min:8|max:10',
            'phone' => 'required'
       ]);

       $validate['password'] = Hash::make($validate['password']);
       if($request->input('via_admin')){
            $validate['role_id'] = $request->role_id;
       }else{
           $validate['role_id'] = 3;
       }


       if($request->input('via_admin')){
           return redirect('/users')->with('success', 'Data pengguna berhasil ditambahkan. Silahkan cek email untuk verifikasi!');
       }else{
           return redirect('/login')->with('success', 'Registrasi berhasil. Silahkan cek email untuk verifikasi!');
       }
   
    }


    public function login()
    {
        $title = 'Form Login';
        return view('auth.login', compact('title'));
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // mengambil data user yang sedang login
            $user = Auth::user();

            // cek role user
            if($user->role->role_name == 'admin'){
                return redirect()->intended('/dashboard')->with('success', 'Selamat datang' . $user->name);
            }else{
                return redirect()->intended('/')->with('success', 'Selamat datang '. $user->name);
            }

        }

        return back()->with('loginError', 'Login gagal !');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda berhasil logout!');
    }
}


