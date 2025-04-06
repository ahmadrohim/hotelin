@extends('admin.layout.main')

@section('container')

<div class="container-fluid mt-4">
    <!-- Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800 text-uppercase">Detail Pemesanan</h1>
    </div>

    <!-- Card Detail Pemesanan -->
    <div class="card shadow my-5">
        <div class="card-header bg-danger"></div>
        <div class="card-body">
            <div class="row no-gutters">
                <!-- Gambar Kamar -->
                <div class="col-md-6">
                    <div class="room-image-wrapper">
                        <img src="/images/room/{{ $reservation->room->image }}" class="room-image img-fluid rounded" alt="Gambar {{ $reservation->room->name }}">
                    </div>
                    <div class="mt-3">
                        <h4 class="card-title text-danger text-uppercase font-weight-bold">{{ $reservation->room->name . ' | ' . $reservation->room->category->name }}</h4>
                    </div>
                </div>

                <!-- Detail Pemesanan -->
                <div class="col-md-6">
                    <div class="card-body text-dark">
                        <p><i class="fas fa-user"></i> <strong>Nama Pemesan:</strong> {{ $reservation->user->name }}</p>
                        <p><i class="fas fa-door-open"></i> <strong>Kode Pemesanan:</strong> {{ $reservation->code_booking }}</p>
                        <p><i class="fas fa-calendar-check"></i> <strong>Check-In:</strong> {{ \Carbon\Carbon::parse($reservation->check_in_date)->format('d M Y') }}</p>
                        <p><i class="fas fa-calendar-times"></i> <strong>Check-Out:</strong> {{ \Carbon\Carbon::parse($reservation->check_out_date)->format('d M Y') }}</p>

                        <p><i class="fas fa-bed"></i> <strong>Extra Bed:</strong> 
                            {{ $reservation->extra_bed ? $reservation->extra_bed : 'Tidak' }}
                        </p>

                        <p><i class="fas fa-money-bill-wave"></i> <strong>Total Harga:</strong> 
                            <span class="font-weight-bold text-success">Rp {{ number_format($reservation->total_price, 2, ',', '.') }}</span>
                        </p>

                        <p><i class="fas fa-credit-card"></i> <strong>Metode Pembayaran:</strong> 
                            {{ ucfirst($reservation->payment_method) }}
                        </p>

                        <p><i class="fas fa-receipt"></i> <strong>Bukti Pembayaran:</strong><br>
                            @if ($reservation->payment_proof)
                                <a href="{{ asset('files/paymentProof/' . $reservation->payment_proof) }}" target="_blank" class="btn btn-info mt-2">
                                    <i class="fas fa-file"></i> Lihat Bukti Pembayaran
                                </a>
                            @else
                                <span class="text-muted">Belum diunggah</span>
                            @endif
                        </p>

                        <p><i class="fas fa-info-circle"></i> <strong>Status:</strong> 
                            <span class="badge {{ $reservation->status == 'pending' ? 'badge-warning' : ($reservation->status == 'approved' || 'confirmed' ? 'badge-success' : 'badge-danger') }} p-2">
                                {{ ucfirst($reservation->status) }}
                            </span>
                        </p>
                        <hr>
                        <div class="mt-3 d-flex justify-content-between">
                            <a href="/reservation" class="btn btn-primary mb-3">
                                <i class="fas fa-arrow-left"></i> Kembali ke Daftar Pemesanan
                            </a>

                            <div class="">
                                <a href="/reservation/edit/{{ $reservation->code_booking }}" class="btn btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="/reservation/destroy/{{ $reservation->code_booking }}" class="d-inline" method="post">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Yakin ingin menghapus data pemesanan?')" type="submit" class="btn btn-danger"> 
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection