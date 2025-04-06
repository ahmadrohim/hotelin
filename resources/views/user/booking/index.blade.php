@extends('user.layout.main')

@section('content')

<section class="page-section" id="bookings">
    <div class="container">
        <br>
        <div class="text-center">
            <h2 class="text-uppercase title-heading">Daftar Pemesanan Anda</h2>
            <h3 class="section-subheading subtitle">Cek status pemesanan kamar Anda di sini.</h3>
        </div>

        <div class="mb-4">
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif   
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
                            <hr>
                            <p class="card-text">Kode Booking: <strong>{{ $booking->code_booking }}</strong></p>
                            <p class="card-text">Check-in: <strong>{{ date('d M Y', strtotime($booking->check_in_date)) }}</strong></p>
                            <p class="card-text">Check-out: <strong>{{ date('d M Y', strtotime($booking->check_out_date)) }}</strong></p>
                            <p class="card-text">Total Harga: <strong>Rp. {{ number_format($booking->total_price, 2, ',', '.') }}</strong></p>
                        </div>

                        <div class="card-body text-center" style="border: none; background-color: #BF3131">
                            <p class="card-text text-white">Status Pembayaran: <span style="border-radius: 5px" class="p-1 text-white text-capitalize @if($booking->payment_status == 'pending') bg-warning @elseif($booking->payment_status == 'paid') bg-success  @elseif($booking->payment_status == 'failed') bg-danger @endif">{{ $booking->payment_status }}</span>
                            </p>
                            <p class="card-text text-white">Status Pemesanan: 
                                <span style="border-radius: 5px" class="p-1 text-capitalize 
                                    @if($booking->status == 'pending') bg-warning text-white
                                    @elseif($booking->status == 'confirmed') bg-success text-white
                                    @elseif($booking->status == 'cancelled') bg-danger text-white
                                    @else badge-secondary @endif">
                                    {{ $booking->status }}
                                </span>
                            </p> 

                            <div class="card-body p-3 d-flex flex-column gap-2">

                                @if($booking->payment_status == 'pending' || 'failed')
                                <a href="/booking/edit/{{ $booking->code_booking }}" class="btn btn-success btn-sm w-100">
                                    <i class="fas fa-upload me-1"></i> Upload Bukti Pembayaran
                                </a>
                                @endif
                        
                                @if(!$booking->payment_proof)
                                <form action="/booking/destroy/{{ $booking->code_booking }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger btn-sm w-100"
                                        onclick="return confirm('Anda yakin membatalkan pesanan?')">
                                         <i class="fas fa-times me-1"></i> Batalkan Pesanan
                                     </button>
                                </form>
                                @endif
                        
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

@endsection