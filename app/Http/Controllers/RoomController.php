<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Room;

class RoomController extends Controller
{
    
    // admin 
    public function index()
    {
        $data = [
            'halaman' => request('page') ? request('page') : 1,
            'rooms' => Room::with('facilities', 'images')->filter(request(['search']))->latest()->paginate(10)->withQueryString(),
        ];

        return view('admin.room.index', $data);
    }
    
    public function create()
    {
        $data = [
            'url' => '/rooms/store',
            'facilities' => Facility::all()
        ];
        return view('admin.room.create', $data);
    }

   
    public function store(Request $request)
    {
        
          // Validasi input
            $request->validate([
                'name' => 'required',
                'price' => 'required|numeric',
                'max_guest' => 'required|integer',
                'description' => 'nullable',
                'bed_type' => 'nullable|string',
                'facilities.*' => 'exists:facilities,id', // Pastikan id fasilitas valid
                'images.*' => 'image|mimes:jpg,jpeg,png,webp',
            ]);

            // Buat data kamar dulu
            $room = Room::create([
                'name' => $request->name,
                'price' => $request->price,
                'max_guest' => $request->max_guest,
                'description' => $request->description,
                'bed_type' => $request->bed_type,
            ]);

            // Simpan fasilitas ke pivot table
            if ($request->has('facilities')) {
                $room->facilities()->sync($request->facilities); // Menyimpan fasilitas dalam pivot table
            }

            // Proses upload gambar dan simpan ke pivot table room_images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                    // Pastikan folder ada
                    File::ensureDirectoryExists(public_path('images/room'), 0755, true);

                    // Pindahkan file ke folder public/images/room
                    $image->move(public_path('images/room'), $imageName);

                    // Simpan data gambar di pivot table room_images
                    $room->images()->create([
                        'image' => $imageName
                    ]);
                }
            }

            return redirect('/rooms')->with('success', 'Kamar berhasil ditambahkan');
       
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
