<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\RoomCategory;

class RoomCategoryController extends Controller
{
    
    public function index()
    {
        $halaman = request('page') ? request('page') : 1;
        $categories = RoomCategory::with('rooms')->filter(request(['search']))->paginate(10)->withQueryString();
        return view('admin.roomcategory.index', compact('categories', 'halaman'));
    }

    
    public function create()
    {
        return view('admin.roomCategory.create');
    }

    
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:room_categories,name',
            'base_price' => 'required|integer|min:1',
            'max_guests' => 'required|integer|min:1',
            'image' => ['required', 'image', 'mimes:jpeg,jpg,webp', 'max:1024']
        ]);

        // proses upload gambar ke 'public/image/categoriesroom
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // pastikan folder ada
            File::ensureDirectoryExists(public_path('images/categoriesroom'), 0755, true);

            // pindahkan file ke 'public/images/categoriesroom
            $image->move(public_path('images/categoriesroom'), $imageName);

            // simpan path gambar ke database
            $validate['image'] = $imageName;
        }

        // simpan data ke database
        RoomCategory::create($validate);

        return redirect('categoryRoom')->with('success', 'Data kategori berhasil ditambahkan!');

    }


    public function show($code_category_room)
    {
        $category = RoomCategory::where('code_category_room', $code_category_room)->firstOrFail();

        return view('admin.roomCategory.show', compact('category'));
    }

   
    public function edit($code_category_room)
    {
        $category = RoomCategory::where('code_category_room', $code_category_room)->firstOrFail();
        
        return view('admin.roomCategory.edit', compact('category'));
    }

    
    public function update(Request $request, $code_category_room)
    {
        return response()->json($request);
    }

    public function destroy($id)
    {
        //
    }
}
