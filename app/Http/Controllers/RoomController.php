<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\RoomCategory;

class RoomController extends Controller
{
    public function index($code_category_room)
    {
        $Hotel = Hotel::first();
        $room = RoomCategory::where('code_category_room', $code_category_room)->firstOrFail();
        $rooms = $room->rooms; 

        return view('user.room.index', compact('Hotel','rooms', 'room'));


    }
}
