<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Booking;

class ReservationController extends Controller
{

    public function index()
    {
        $data = [
            'halaman' => request('page') ? request('page') : 1,
            'reservations' => Booking::with(['room', 'room.category', 'user'])->filter(request(['search']))->paginate(10)->withQueryString(),
        ];

        return view('admin.reservation.index', $data);
    }

    public function show($code_booking)
    {
        $data = [
            'reservation' => Booking::with(['room', 'room.category', 'user'])->where('code_booking', $code_booking)->first(),
        ];
        
        return view('admin.reservation.show', $data);

        
    }

    public function edit($code_booking)
    {
        $data = [
            'reservation' => Booking::with(['room', 'room.category', 'user'])->where('code_booking', $code_booking)->first(),
        ];

        return view('admin.reservation.edit', $data);
    }

    public function update(Request $request, $code_booking)
    {
        return response()->json($request);
    }

    public function destroy($id)
    {
        //
    }
}
