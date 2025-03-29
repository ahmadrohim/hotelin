<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Hotel;
use App\Models\RoomCategory;
use App\Models\Room;

class RoomController extends Controller
{
    
    //  semua pengguna
    public function index($code_category_room)
    {
        $Hotel = Hotel::first();
        $room = RoomCategory::where('code_category_room', $code_category_room)->firstOrFail();
        $rooms = $room->rooms; 

        return view('user.room.index', compact('Hotel','rooms', 'room'));
    }


    // admin 
    public function ourRooms()
    {

        $halaman = request('page') ? request('page') : 1;
        $rooms = Room::with('category')->filter(request(['search']))->paginate(10)->withQueryString();

        return view('admin.room.index', compact('rooms', 'halaman'));
    }
    
    public function create()
    {
        $url = '/room/store';
        $roomCategory = RoomCategory::all();
        return view('admin.room.create', compact('url', 'roomCategory'));
    }

   
    public function store(Request $request)
    {
         // Validasi input
        $validate = $request->validate([
            'name' => 'required',
            'category_id' => ['required', 'exists:room_categories,id'],
            'price' => 'required|numeric',
            'facilities' => 'required', // Bisa array
            'image' => ['required', 'image', 'mimes:jpeg,jpg,webp', 'max:1024']
        ]);

        // Konversi `facilities` ke string (pisahkan dengan koma jika array)
        $validate['facilities'] = is_array($validate['facilities']) 
            ? implode(',', $validate['facilities']) 
            : $validate['facilities'];

       
        // Ambil kategori kamar
        $category = RoomCategory::findOrFail($validate['category_id']);

        if($category){
            // ambil prefix dari kode kategory
            $prefix = strtoupper($category->code_category_room);

            // cari kode kamar terakhir berdasarkan prefik kategory
            $lasRoom = Room::where('category_id', $category->id)
                ->where('code_room', 'LIKE', $prefix, '%')
                ->orderBy('code_room', 'desc')->first();

                if($lasRoom){
                    // ekstrak angka dari kode terakhir
                    $lastNumber = (int) substr($lasRoom->code_room, strlen($prefix));
                    $newNumber = $lastNumber + 1;
                }else{
                    $newNumber = 1; //jika belum ada kamar dalam kategori ini
                }

                // format code_room dengan padding 
                $codeRoom = $prefix . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

                // pastikan code room benar-benar unik
                while(Room::where('code_room', $codeRoom)->exists()){
                    $newNumber++;
                    $codeRoom = $prefix . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
                }

                // simpan ke array yang akan dimasukan ke database
                $validate['code_room'] = $codeRoom;

        }

        // Proses upload gambar ke `public/image/room`
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Pastikan folder ada
            File::ensureDirectoryExists(public_path('images/room'), 0755, true);

            // Pindahkan file ke `public/image/room`
            $image->move(public_path('images/room'), $imageName);

            // Simpan path gambar ke database
            $validate['image'] = $imageName;
        }


        // Simpan data ke database
        Room::create($validate);

        return redirect('/ourRoom')->with('success', 'Data kamar berhasil ditambahkan!');
    }

   
    public function show($code_room)
    {
        $room = Room::where('code_room', $code_room)->firstOrFail();

        return view('/admin/room/show', compact('room'));
    }

  
    public function edit($code_room)
    {
        $roomCategory = RoomCategory::all();
        $room = Room::where('code_room', $code_room)->firstOrFail();
        $url = '/room/update/';

        return view('/admin/room/edit', compact('room', 'url', 'roomCategory'));
    }

  
    public function update(Request $request, $code_room)
    {
        $room = Room::where('code_room', $code_room)->firstOrFail();

        $validate = $request->validate([
            'name' => 'required',
            'category_id' => ['required', 'exists:room_categories,id'],
            'price' => 'required|numeric',
            'facilities' => 'required',
        ]);

       // Cek apakah kategori berubah
        if ($room->category_id != $validate['category_id']) {
            // Ambil kategori baru
            $category = RoomCategory::findOrFail($validate['category_id']);
            $prefix = strtoupper($category->code_category_room);

            // Cari kode kamar terakhir berdasarkan kategori
            $lastRoom = Room::where('category_id', $category->id)
                ->where('code_room', 'LIKE', $prefix . '%')
                ->orderBy('code_room', 'desc')
                ->first();

            if ($lastRoom) {
                // Ekstrak angka dari kode terakhir (misal: SUP006 -> 6)
                $lastNumber = (int) substr($lastRoom->code_room, strlen($prefix));
                $newNumber = $lastNumber + 1;
            } else {
                $newNumber = 1; // Jika belum ada kamar dalam kategori ini
            }

            // Format code_room
            $newCodeRoom = $prefix . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

            // Pastikan code_room benar-benar unik
            while (Room::where('code_room', $newCodeRoom)->exists()) {
                $newNumber++;
                $newCodeRoom = $prefix . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
            }

            $validate['code_room'] = $newCodeRoom;
        } else {
            // Jika kategori tidak berubah, gunakan code_room lama
            $validate['code_room'] = $room->code_room;
        }


        // proses upload gambar jika ada gambar baru
        if($request->hasFile('image')){
            // hapus gambar lama jika ada
            if($room->image && file_exists(public_path('images/room/' . $room->image))){
                unlink(public_path('images/room/' . $room->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // pastikan folder ada
            File::ensureDirectoryExists(public_path('images/room'), 0755, true);

            // pindahkan file ke 'public/images/room'
            $image->move(public_path('images/room'), $imageName);

            // simpan path gambar ke database
            $validate['image'] = $imageName;
        }else{
            // jika tidak ada gambar baru, gunakan gambar lama
            $validate['image'] = $room->image;
        }

        // update data di database
        $room->update($validate);

        return redirect('/ourRoom')->with('success', 'Data kamar behasil diperbarui!');

    }

    public function destroy($code_room)
    {
        // ambil data kamar
        $room = Room::where('code_room', $code_room)->first();


        // cek apakah kamar ada
        if(!$room){
            return redirect()->back()->with('error', 'Kamar tidak ditemukan!');
        }

        //path gambar disimpan
        $imagePath = public_path('images/room/'. $room->image);

        // hapus file gambar jika ada
        if(File::exists($imagePath)){
            File::delete($imagePath);
        }
        
        // hapus data dari database
        $room->delete();
        
        return redirect('ourRoom')->with('success', 'Kamar berhasil dihapus!');
       
    }
}
