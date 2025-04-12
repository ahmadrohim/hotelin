<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    
    public function index()
    {
        $data = [
            'halaman' => request('page') ? request('page') : 1,
            'from' => '',
            'users' => User::filter(request(['search']))->latest()->paginate(10)->withQueryString()
        ];
        return view('admin.users.index', $data);
    }

    
    public function create()
    {
        return view('admin.users.create');
    }

 
    public function store(Request $request)
    {
        //
    }

   
    public function show($code_user)
    {
        $data = [
            'user' => User::with(['bookings', 'role'])->where('code_user', $code_user)->firstOrFail()
        ];
        return view('admin.users.show', $data);
    }


  
    public function edit($code_user)
    {
        $data = [
            'user' => User::with(['bookings', 'role'])->where('code_user', $code_user)->firstOrFail(),
        ]; 

        return view('admin.users.edit', $data);
       
    }

  
    public function update(Request $request, $code_user)
    {
        $user = User::where('code_user', $code_user)->firstOrFail();
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id . ',id',
            'phone' => 'required|string|max:15',
            'role_id' => 'required|integer|exists:roles,id',
            'password' => 'nullable|string|min:8|confirmed',
        ]);
    

         // Jika password diisi, hash dan masukkan ke array validasi

         if($request->filled('password')){
            $validate['password'] = Hash::make($validate['password']);
         }else{
            unset($validate['password']);
         }

        $user->update($validate);

        return redirect()->back()->with('success', 'Data pengguna berhasil diperbarui!');
    }

   
    public function destroy($code_user)
    {
        $user = User::where('code_user', $code_user)->firstOrFail();

        $user->delete();

        return redirect()->back()->with('success', 'Data pengguna berhasil dihapus!');
    }
}
