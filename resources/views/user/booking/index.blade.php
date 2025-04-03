@extends('user.layout.main')

@section('content')

<section class="page-section section-texture" id="bookings">
    <div class="container">
        <br>
        <div class="text-center">
            <h2 class="text-uppercase title-heading">Daftar Pemesanan Anda</h2>
            <h3 class="section-subheading subtitle">Cek status pemesanan kamar Anda di sini.</h3>
        </div>

        @if($Bookings->isEmpty())
            <div class="alert alert-info text-center">Anda belum memiliki pemesanan kamar.</div>
        @else
            <div class="row">
                @foreach($Bookings as $booking)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title"><strong>{{ $booking->room->name }} | <span class="text-dark">{{ $booking->room->category->name }}</span></strong></h5>
                            <p class="card-text">Kode Booking: <strong>{{ $booking->code_booking }}</strong></p>
                            <p class="card-text">Check-in: <strong>{{ date('d M Y', strtotime($booking->check_in_date)) }}</strong></p>
                            <p class="card-text">Check-out: <strong>{{ date('d M Y', strtotime($booking->check_out_date)) }}</strong></p>
                            <p class="card-text">Total Harga: <strong>Rp. {{ number_format($booking->total_price, 2, ',', '.') }}</strong></p>
                            <p class="card-text">Status Pembayaran: <span class="p-1 @if($booking->payment_status == 'pending') bg-warning @elseif($booking->payment_status == 'paid') bg-success @elseif($booking->payment_status == 'failed') bg-danger @endif">{{ $booking->payment_status }}</span>
                            </p>
                            <p class="card-text">Status Pemesanan: 
                                <span class="p-1 
                                    @if($booking->status == 'pending') bg-warning
                                    @elseif($booking->status == 'confirmed') bg-success
                                    @elseif($booking->status == 'cancelled') bg-danger
                                    @else badge-secondary @endif">
                                    {{ $booking->status }}
                                </span>
                            </p>

                             <!-- Link untuk Upload Pembayaran -->
                            @if($booking->payment_status == 'pending')
                            <a href="/booking/edit/{{ $booking->code_booking }}" class="btn-read-more mt-3">Upload Bukti Pembayaran</a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

@endsection