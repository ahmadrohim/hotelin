<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\RoomCategory;

class RoomCategoryController extends Controller
{
    
    public function index()
    {

        $data = [
            'halaman' => request('page') ? request('page') : 1,
            'categories' => RoomCategory::with('rooms')->filter(request(['search']))->paginate(10)->withQueryString()
        ];

        return view('admin.roomcategory.index', $data);
    }

    
    public function create()
    {
        return view('admin.roomCategory.create');
    }

    
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:room_categories,name',
            'base_price' => 'required|numeric|min:1',
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
        $data = [
            'category' => RoomCategory::where('code_category_room', $code_category_room)->firstOrFail()
        ];

        return view('admin.roomCategory.show', $data);
    }

   
    public function edit($code_category_room)
    {
        $data = [
            'category' => RoomCategory::where('code_category_room', $code_category_room)->firstOrFail()
        ];
        return view('admin.roomCategory.edit', $data);
    }

    
    public function update(Request $request, $code_category_room)
    {
        $category = RoomCategory::where('code_category_room', $code_category_room)->firstOrFail();

        $validate = $request->validate([
            'name' => 'required',
            'base_price' => 'required|numeric|min:1',
            'max_guests' => 'required|integer|min:1',
            'image' => ['image', 'mimes:jpeg,jpg,webp', 'max:1024']
        ]);

        // proses upload gambar jika ada gambar baru
        if($request->hasFile('image')){
            // hapus gambar lama jika ada
            if($category->image && file_exists(public_path('images/categoriesroom/' . $category->image))){
                unlink(public_path('images/categoriesroom/' . $category->image));   
            }

            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // pastikan folder ada
            File::ensureDirectoryExists(public_path('images/categoriesroom'), 0755, true);

            // pindahkan file ke 'public/images/categoriesroom'
            $image->move(public_path('images/categoriesroom'), $imageName);

            // simpan path gambar ke database
            $validate['image'] = $imageName;
        }else{
            // jika tidak ada gambar baru, gunakan gambar lama
            $validate['image'] = $category->image;
        }

        $category->update($validate);

        return redirect('/categoryRoom')->with('success', 'Data kategori berhasil diperbarui!');
        
    }

    public function destroy($code_category_room)
    {
         // ambil data kamar
         $category = RoomCategory::where('code_category_room', $code_category_room)->first();


         // cek apakah kamar ada
         if(!$category){
             return redirect()->back()->with('error', 'Kategori tidak ditemukan!');
         }
         
         // hapus data dari database
         $category->deleteCategory();
         
         return redirect('categoryRoom')->with('success', 'Kategori berhasil dihapus!');
    }
}
