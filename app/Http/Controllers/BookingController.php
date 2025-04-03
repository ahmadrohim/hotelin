<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Booking;
use App\Models\Hotel;
use App\Models\PaymentMethod;
use App\Models\Room;
use App\Mail\PaymentUploadMail;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        $data = [
            'Hotel' => Hotel::first(),
            'Bookings' => Booking::with(['room', 'room.category', 'user'])->where('user_id', $user_id)->get()
        ];
        
        return view('user.booking.index', $data);
    }

    public function create($code_room)
    {
        $data = [
            'Hotel' => Hotel::first(),
            'room' => Room::where('code_room', $code_room)->firstOrFail(),
            'paymentMethod' => PaymentMethod::first()
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

        // cek ketersediaan kamar
        $isBooked = Booking::where('room_id', $room->id)
        ->where('status', '!=', 'canceled') //hanya cek booking yang belum dibatalkan
        ->where(function($query) use ($request){
                $query->whereBetween('check_in_date', [$request->check_in_date, $request->check_out_date])
                    ->orWhereBetween('check_out_date', [$request->check_in_date, $request->check_out_date])
                    ->orWhere(function($q) use ($request){
                        $q->where('check_in_date', '<=', $request->check_in_date)
                            ->where('check_out_date', '>=', $request->check_out_date);
                    });
        })->exists();

        if($isBooked){
            return back()->with('error', 'Kamar tidak tersedia pada tanggal yang dipilih!');
        }

           // **Bersihkan format angka total_price**
            $clean_total_price = $request->total_price;

            // **Hapus karakter non-angka yang sering muncul**
            $clean_total_price = str_replace(['Rp', ' ', ' '], '', $clean_total_price); // Hapus 'Rp', non-breaking space, dan spasi biasa
            $clean_total_price = str_replace('.', '', $clean_total_price); // Hapus titik (pemformat ribuan)
            $clean_total_price = str_replace(',', '.', $clean_total_price); // Ubah koma desimal menjadi titik

            // **Konversi ke angka float**
            $clean_total_price = (float) filter_var($clean_total_price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

            // **Cek apakah angka valid dan lebih dari 0**
            if ($clean_total_price <= 0) {
                return back()->withErrors(['error' => 'Total harga tidak valid.']);
            }

            
        $validate['total_price'] = $clean_total_price;
        $validate['code_booking'] = 'BOOK-' . strtoupper(Str::random(10));
        $validate['user_id'] = $user->id;
        $validate['room_id'] = $room->id;

        // Simpan booking baru ke database
        $booking = Booking::create($validate);

        // Kirim email ke user
        Mail::to($user->email)->send(new PaymentUploadMail($booking));

        return redirect('/booking/edit/'. $validate['code_booking'])->with('success', 'Lakukan pembayaran!');
    }

    public function edit($code_booking)
    {
        $booking = Booking::where('code_booking', $code_booking)->firstOrFail();

        $data = [
            'Hotel' => Hotel::first(),
            'Booking' => $booking
        ];

        return view('user.booking.uploadPayment', $data);

    }

    public function update(Request $request, $code_booking)
    {
        $validate = $request->validate([
            'code_booking' => 'required',
            'payment_proof' => ['required', 'mimes:jpg,jpeg,png,pdf', 'max:1024']
        ]);

        $booking = Booking::where('code_booking', $code_booking)->firstOrFail();

        // proses upload file 
        if($request->hasFile('payment_proof')){
           if($booking->payment_proof && file_exists(public_path('files/paymentProof/' . $booking->payment_proof))){
                unlink(public_path('files/paymentProof/' . $booking->payment_proof));
           }

           $file = $request->file('payment_proof');
           $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            //pastikan folder ada
            File::ensureDirectoryExists(public_path('files/paymentProof'), 0755, true);

            // pindahkan file ke path
            $file->move(public_path('files/paymentProof'), $fileName);

            // simpan path file ke database
            $validate['payment_proof'] = $fileName;
        }else{
            $validate['payment_proof'] = $booking->payment_proof;
        }

        $booking->update($validate);

        return redirect('/booking/' . $booking->user_id)->with('success', 'Bukti pembayaran berhasil dikirim. Pemesanan kamar segera diproses.');

    }

    public function destroy($id)
    {
        //
    }
}
