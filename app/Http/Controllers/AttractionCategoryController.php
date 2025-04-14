<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AttractionCategory;

class AttractionCategoryController extends Controller
{
    
    public function index()
    {
        $data = [
            'halaman' => request('page') ? request('page') : 1,
            'url' => '/categoryAttraction',
            'from' => '',
            'categories' => AttractionCategory::filter(request(['search']))->latest()->paginate(10)->withQueryString()
        ];

        return view('admin.attractioncategory.index', $data);
    }

    
    public function create()
    {
        return view('admin.attractioncategory.create');
    }

    
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:attraction_categories'
        ]);

        AttractionCategory::create($validate);

        return redirect('/categoryAttraction')->with('success', 'Data kategori wisata berhasil ditambahkan!');
    }

    
    public function show($id)
    {
        //
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
