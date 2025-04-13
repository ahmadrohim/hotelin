<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\HotelFaicilities;

class FacilitiesController extends Controller
{
 
    public function index()
    {
        $data = [
            'halaman' => request('page') ? request('page') : 1,
            'facilities' => HotelFaicilities::filter(request(['search']))->latest()->paginate(10)->withQueryString()
        ];

        return view('admin.facilities.index', $data);
    }

   
    public function create()
    {
        return view('admin.facilities.create');
    }


    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => ['required', 'image', 'mimes:jpeg,jpg,webp', 'max:1024']
        ]);

        // proses upload gambar ke 'public/images/services
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // pastikan folder ada
            File::ensureDirectoryExists(public_path('images/services'), 0755, true);

            // pindahkan file ke 'public/images/services
            $image->move(public_path('images/services'), $imageName);

            // simpan path gambar ke database
            $validate['image'] = $imageName;
        }

        // simpan data ke database
        HotelFaicilities::create($validate);

        return redirect('/facilities')->with('success', 'Data fasilitas berhasil ditambahkan!');
      
    }

    
    public function show($code_facilities)
    {
        $data = [
            'facilities' => HotelFaicilities::where('code_facilities', $code_facilities)->firstOrFail()
        ];
        return view('admin.facilities.show', $data);
        
    }

  
    public function edit($code_facilities)
    {
        $data = [
            'facilities' => HotelFaicilities::where('code_facilities', $code_facilities)->firstOrFail()
        ];

        return view('admin.facilities.edit', $data);
    }

 
    public function update(Request $request, $code_facilities)
    {
        $validate = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => ['required', 'image', 'mimes:jpeg,jpg,webp', 'max:1024']
        ]);

        $facilities = HotelFaicilities::where('code_facilities', $code_facilities)->firstOrFail();
        // proses upload gambar jika ada gambar baru
        if($request->hasFile('image')){
            if($facilities->image && file_exists(public_path('images/services/'. $facilities->image))){
                unlink(public_path('images/services/' . $facilities->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

             // pastikan folder ada
             File::ensureDirectoryExists(public_path('images/services'), 0755, true);

               // pindahkan file ke 'public/images/room'
            $image->move(public_path('images/services'), $imageName);

            $validate['image'] = $imageName;
        }else{
            $validate['image'] = $facilities->image;
        }
         
        $facilities->update($validate);
        return redirect('/facilities')->with('success', 'Data fasilitas berhasil diperbarui!');
    }

  
    public function destroy($code_facilities)
    {
        $facilities = HotelFaicilities::where('code_facilities', $code_facilities)->firstOrFail();

        $facilities->deleteFacilities();
        return redirect('/facilities')->with('success', 'Data fasilitas berhasil dihapus!');

    }
}
