<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\BookingStatusUpdated;
use Illuminate\Support\Facades\Mail;

use App\Models\Booking;

class ReservationController extends Controller
{
    // semua pemesanan
    public function index()
    {
        $data = [
            'halaman' => request('page') ? request('page') : 1,
            'reservations' => Booking::with(['room', 'room.category', 'user'])->filter(request(['search']))->paginate(10)->withQueryString(),
        ];

        return view('admin.reservation.index', $data);
    }

    // detail pemesanan
    public function show($code_booking)
    {
        $data = [
            'reservation' => Booking::with(['room', 'room.category', 'user'])->where('code_booking', $code_booking)->first(),
        ];
        return view('admin.reservation.show', $data);
    }

    // form edit
    public function edit($code_booking)
    {
        $data = [
            'reservation' => Booking::with(['room', 'room.category', 'user'])->where('code_booking', $code_booking)->first(),
        ];

        return view('admin.reservation.edit', $data);
    }

    // logic update
    public function update(Request $request, $code_booking)
    {
        $validate = $request->validate([
            'payment_status' => 'required',
            'status' => 'required'
        ]);

        $reservation = Booking::where('code_booking', $code_booking)->firstOrFail();

        if(!$reservation->payment_proof){
            return redirect('/reservation')->with('error', 'Bukti pembayaran belum diunggah!');
        }

        $reservation->update($validate);

         // Kirim email ke user
        Mail::to($reservation->user->email)->send(new BookingStatusUpdated($reservation));

        return redirect('/reservation')->with('success', 'Status pemesanan berhasil diperbarui!');
    }

    // hapus sementara
    public function destroy(Request $request, $code_booking)
    {
        $reservation = Booking::where('code_booking', $code_booking)->firstOrFail();

        if(!$reservation){
            return redirect()->back()->with('error', 'Data pesanan tidak ditemukan!');
        }

        $reservation->delete();

        return redirect()->back()->with('success', 'Data pesanan berhasil dihapus');
    }

    // pemesanan aktiv
    public function active()
    {
        $data = [
            'halaman' => request('page') ? request('page') : 1,
            'reservations' => Booking::with(['user', 'room', 'room.category'])->whereIn('status', ['pending', 'confirmed'])->filter(request(['search']))->paginate(10)->withQueryString(),
        ];

        return view('admin.reservation.active', $data);



    }
}
