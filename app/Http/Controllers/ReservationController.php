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
            'url' => '/reservation',
            'from' => ' ',
            'title' => 'Daftar Semua Pemesanan',
            'reservations' => Booking::with(['room', 'room.category', 'user'])->filter(request(['search']))->latest()->paginate(10)->withQueryString(),
        ];

        return view('admin.reservation.index', $data);
    }

    // detail pemesanan
    public function show($code_booking)
    {
        $data = [
            'reservation' => Booking::withTrashed()->with(['room', 'room.category', 'user'])->where('code_booking', $code_booking)->first(),
        ];
        return view('admin.reservation.show', $data);
    }

    // form edit
    public function edit($code_booking)
    {
        $data = [
            'reservation' => Booking::withTrashed()->with(['room', 'room.category', 'user'])->where('code_booking', $code_booking)->first(),
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

         // Jika ingin cancel, pastikan hanya bisa jika belum dibayar
            if ($validate['status'] == 'cancelled') {
                if ($reservation->payment_status != 'pending') {
                    return redirect()->back()->with('error', 'Pesanan hanya bisa dibatalkan jika pembayaran belum dilakukan.');
                }

                if($validate['payment_status'] == 'paid'){
                    return redirect()->back()->with('error', 'Status pesanan gagal diperbarui!');
                }
            }

            // Jika ingin lanjut ke confirmed atau completed, pastikan pembayaran sudah dilakukan dan ada bukti
            if (in_array($validate['status'], ['confirmed', 'completed'])) {
                if ($reservation->payment_status == 'pending') {
                    return redirect()->back()->with('error', 'Pembayaran belum diselesaikan!');
                }

                if (!$reservation->payment_proof) {
                    return redirect()->back()->with('error', 'Bukti pembayaran belum diunggah!');
                }
            }

        $reservation->update($validate);

         // Kirim email ke user
        Mail::to($reservation->user->email)->send(new BookingStatusUpdated($reservation));

        return redirect()->back()->with('success', 'Status pemesanan berhasil diperbarui!');
    }

    // hapus sementara
    public function destroy($code_booking)
    {
        $reservation = Booking::where('code_booking', $code_booking)->firstOrFail();

        if(!$reservation){
            return redirect()->back()->with('error', 'Data pesanan tidak ditemukan!');
        }

        $reservation->delete();

        return redirect()->back()->with('success', 'Data pesanan berhasil dihapus');
    }


    // pemesanan pending
    public function pending()
    {
        $data = [
            'halaman' => request('page') ? request('page') : 1,
            'url' => '/reservation/pending',
            'from' => 'pending',
            'title' => 'Daftar Pemesanan Pending',
            'reservations' => Booking::with(['user', 'room', 'room.category'])->whereIn('status', ['pending'])->filter(request(['search']))->latest()->paginate(10)->withQueryString(),
        ];

        return view('admin.reservation.index', $data);
    }

    // pemesanan aktiv
    public function active()
    {
        $data = [
            'halaman' => request('page') ? request('page') : 1,
            'url' => '/reservation/active',
            'from' => 'active',
            'title' => 'Daftar Pemesanan Aktif',
            'reservations' => Booking::with(['user', 'room', 'room.category'])->whereIn('status', ['confirmed'])->filter(request(['search']))->latest()->paginate(10)->withQueryString(),
        ];

        return view('admin.reservation.index', $data);
    }

    // pemesanan selesai
    public function completed()
    {
        $data = [
            'halaman' => request('page') ? request('page') : 1,
            'url' => '/reservation/completed',
            'from' => 'completed',
            'title' => 'Daftar Pemesanan Selesai',
            'reservations' => Booking::with(['user', 'room', 'room.category'])->whereIn('status', ['completed'])->filter(request(['search']))->latest()->paginate(10)->withQueryString(),
        ];

        return view('admin.reservation.index', $data);
    }

    // pemesanan dibatlkan
    public function canceled()
    {
        $data = [
            'halaman' => request('page') ? request('page') : 1,
            'url' => '/reservation/canceled',
            'from' => 'canceled',
            'title' => 'Daftar Pemesanan Dibatalkan',
            'reservations' => Booking::with(['user', 'room', 'room.category'])->whereIn('status', ['cancelled'])->filter(request(['search']))->latest()->paginate(10)->withQueryString()
        ];

        return view('admin.reservation.index', $data);
    }

    // arsip pemesanan (dihapus)
    public function archived()
    {
        $data = [
            'halaman' => request('page') ? request('page') : 1,
            'url' => '/reservation/archived',
            'from' => 'archived',
            'title' => 'Daftar Pemesanan Yang Diarsipkan',
            'reservations' => Booking::onlyTrashed()->with(['user', 'room', 'room.category'])->filter(request(['search']))->latest()->paginate(10)->withQueryString()
        ];

        return view('admin.reservation.index', $data);
    }


    // restore arsip pemesanan
    public function restore($code_booking)
    {
        $reservation = Booking::onlyTrashed()->where('code_booking', $code_booking)->first();

        if(!$reservation){
            return redirect('/reservation/archived')->with('error', 'Data pemesanan tidak ditemukan!');
        }

        $reservation->restore();

        return redirect('/reservation/archived')->with('success', 'Data pemesanan berhasil dipulihkan!');
    }

    // hapus permanen
    public function forceDelete($code_booking)
    {
        $reservation = Booking::onlyTrashed()->where('code_booking', $code_booking)->first();

        if(!$reservation){
            return redirect('/reservation/archived')->with('error', 'Data pemesanan tidak ditemukan!');
        }

        $reservation->forceDelete();

        return redirect('/reservation/archived')->with('success', 'Data pemesanan berhasil dihapus secara permanen!');
    }
}
