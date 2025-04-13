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
        $room = RoomCategory::where('code_category_room', $code_category_room)->firstOrFail();
        $data = [
            'Hotel' => Hotel::first(),
            'room' => $room,
            'rooms' => $room->rooms
        ];
        return view('user.room.index', $data);
    }


    // admin 
    public function ourRooms()
    {
        $data = [
            'halaman' => request('page') ? request('page') : 1,
            'rooms' => Room::with('category')->filter(request(['search']))->latest()->paginate(10)->withQueryString(),
        ];

        return view('admin.room.index', $data);
    }
    
    public function create()
    {
        $data = [
            'url' => '/room/store',
            'roomCategory' => RoomCategory::all()
        ];
        return view('admin.room.create', $data);
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
        $data = [
            'room' => Room::where('code_room', $code_room)->firstOrFail()
        ];

        return view('/admin/room/show', $data);
    }

  
    public function edit($code_room)
    {
        $data = [
            'roomCategory' => RoomCategory::all(),
            'room' => Room::where('code_room', $code_room)->firstOrFail(),
            'url' => '/room/update/'
        ];

        return view('/admin/room/edit', $data);
    }

  
    public function update(Request $request, $code_room)
    {
        $room = Room::where('code_room', $code_room)->firstOrFail();

        $validate = $request->validate([
            'name' => 'required',
            'category_id' => ['required', 'exists:room_categories,id'],
            'price' => 'required|numeric',
            'facilities' => 'required',
            'image' => ['image', 'mimes:jpeg,jpg,webp', 'max:1024']
        ]);


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
        $room = Room::where('code_room', $code_room)->firstOrFail();
        
        // hapus data dari database
        $room->deleteRoom();
        
        return redirect('ourRoom')->with('success', 'Kamar berhasil dihapus!');
       
    }
}
