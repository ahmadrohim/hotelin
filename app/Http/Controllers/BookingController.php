<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Room;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function create($code_room)
    {
        $data = [
            'Hotel' => Hotel::first(),
            'room' => Room::where('code_room', $code_room)->firstOrFail()
        ];

        return view('user.booking.create', $data );
       
    }

    public function store(Request $request, $code_room)
    {
        $room = Room::where('code_room', $code_room)->firstOrFail();
        $user = Auth::user();

        $validate = $request->validate([
            'check_in_date' => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date',
            'extra_bed' => 'required',
            'total_price' => 'required',
            'payment_method' => 'required'
        ]);

        $validate['code_booking'] = 'BOOK-' . strtoupper(Str::random(10));
        $validate['user_id'] = $user->id;
        $validate['room_id'] = $room->id;

        return response()->json($validate);
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
