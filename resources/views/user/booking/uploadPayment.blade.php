@extends('user.layout.main')

@section('content')

<section class="page-section section-texture" id="upload-payment">
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
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="code_booking" class="form-label">Kode Booking</label>
                                <input type="text" name="code_booking" id="code_booking" class="form-control" required placeholder="Masukkan kode booking Anda">
                            </div>

                            <div class="mb-3">
                                <label for="payment_proof" class="form-label">Unggah Bukti Pembayaran</label>
                                <input type="file" name="payment_proof" id="payment_proof" class="form-control" required>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" style="border: 0px" class="btn-read-more">Kirim Bukti Pembayaran</button>
                            </div>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection