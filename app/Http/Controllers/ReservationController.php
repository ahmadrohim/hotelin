<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Booking;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
