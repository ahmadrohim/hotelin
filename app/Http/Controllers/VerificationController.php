<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\contracts\Mail\Mailable;
use App\Models\User;

class VerificationController extends Controller
{
    public function verify($id)
    {
        $user = User::find($id);

        if(!$user) {
            return redirect()->back()->with('verifyGagal', 'User tidak ditemukan!');
        }

        if($user->email_verivied_at){
            return redirect()->back()->with('verifyGagals', 'Email sudah diverifikasi!');
        }

        $user->email_verified_at = now();
        $user->save();

        return redirect('/login')->with('verifySuccess', 'Email telah berhasil diverifikasi, silahkan Login!');
    }
}

