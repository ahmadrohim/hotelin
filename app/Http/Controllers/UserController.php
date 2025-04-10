<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    
    public function index()
    {
        $data = [
            'halaman' => request('page') ? request('page') : 1,
            'users' => User::filter(request(['search']))->latest()->paginate(10)->withQueryString()
        ];
        return view('admin.users.index', $data);
    }

    
    public function create()
    {
        //
    }

 
    public function store(Request $request)
    {
        //
    }

   
    public function show($slug)
    {
        $data = [
            'user' => User::with(['bookings'])->where('slug', $slug)->firstOrFail()
        ];

        return view('admin.users.show', $data);
        
    }

  
    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
