<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Hotel;
use App\Models\RoomCategory;
use App\Models\Room;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
        $rooms = Room::paginate(10)->withQueryString();


        return view('admin.room.index', compact('rooms', 'halaman'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = '/room/store';
        return view('admin.room.create', compact('url'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        if ($category) {
            // Ambil prefix dari kode kategori
            $prefix = strtoupper($category->code_category_room);

            // Hitung jumlah kamar dalam kategori ini
            $roomCount = Room::where('category_id', $category->id)->count() + 1;

            // Format code_room
            $codeRoom = $prefix . str_pad($roomCount, 3, '0', STR_PAD_LEFT);

            // Simpan ke array yang akan dimasukkan ke database
            $validate['code_room'] = $codeRoom;
        }

        // Proses upload gambar ke `public/image/room`
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'images/room/' . $imageName;

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($code_room)
    {
        $room = Room::where('code_room', $code_room)->firstOrFail();

        return view('/admin/room/show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
