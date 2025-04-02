<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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


        return response()->json($request);
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
