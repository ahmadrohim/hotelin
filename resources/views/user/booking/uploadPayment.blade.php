@extends('user.layout.main')

@section('content')

<section class="page-section" id="upload-payment">
    <div class="container">
        <div class="text-center">
            <h2 class="text-uppercase title-heading mt-3">Upload Bukti Pembayaran</h2>
            <h3 class="section-subheading subtitle">Silakan unggah bukti pembayaran Anda untuk mengonfirmasi pemesanan.</h3>
        </div>

        <!-- Form Upload Bukti Pembayaran -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-lg border-0 rounded">
                    <div class="card-body p-4">

                        <div class="mb-3">
                            <h5>Silakan lakukan pembayaran melalui:</h5>
                    
                            @if ($Booking->payment_method === 'bank_transfer')
                                <div class="border p-3 rounded bg-light">
                                    <p><strong>Transfer ke Rekening:</strong></p>
                                    <p>Bank: <strong>{{ $PaymentMethod->bank_name }}</strong></p>
                                    <p>Nomor Rekening: <strong>{{ $PaymentMethod->account_number }}</strong></p>
                                    <p>Atas Nama: <strong>{{ $PaymentMethod->account_holder }}</strong></p>
                                </div>
                            @elseif ($Booking->payment_method === 'qris')
                                <div class="border p-3 rounded bg-light text-center">
                                    <p><strong>Scan QRIS di bawah ini untuk melakukan pembayaran:</strong></p>
                                    <img src="/images/paymentmethods/{{ $PaymentMethod->qris_image }}" alt="QRIS Code" style="max-width: 250px;">
                                </div>
                            @endif
                        </div>

                        
                        @if ($Booking->payment_status !== 'paid')
                            <form action="/booking/update/{{ $Booking->code_booking }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                
                                
                                <div class="mb-3">
                                    <label for="code_booking" class="form-label">Kode Booking</label>
                                    <input type="text" name="code_booking" id="code_booking" class="form-control" required placeholder="Masukkan kode booking Anda" value="{{ $Booking->code_booking }}" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="payment_proof" class="form-label">Unggah Bukti Pembayaran</label>
                                    <input type="file" name="payment_proof" id="payment_proof" class="form-control" required>
                                    <p id="file-name" class="mt-2 text-muted"></p>
                                    <small>Max file : <strong>1 mb</strong></small>
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" style="border: 0px" class="btn-read-more">Kirim Bukti Pembayaran</button>
                                    <a href="/booking/{{ Auth::user()->id }}" style="border: 0px" class="btn-success">Pesanan Saya</a>
                                </div>
                            </form>
                        @else
                            <div class="alert alert-info mt-3">
                                Bukti pembayaran tidak dapat diunggah karena status pemesanan Anda adalah 
                                <strong>{{ ucfirst($Booking->status) }}</strong> dan status pembayaran adalah 
                                <strong>{{ ucfirst($Booking->payment_status) }}</strong>.
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection