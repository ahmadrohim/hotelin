@extends('user.layout.main')

@section('content')

<section class="page-section" id="booking">
    <div class="container">
        <div class="text-center">
            <h2 class="text-uppercase title-heading mt-3">Formulir Pemesanan</h2>
            <h3 class="section-subheading subtitle">Lengkapi data berikut untuk melanjutkan pemesanan kamar.</h3>
        </div>

        <!-- Detail Kamar -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-lg border-0 rounded">
                    <div class="card-body p-4">
                        <h4 class="card-title text-center">{{ $room->name }} | <span class="text-dark"> {{ $room->category->name }}</span></h4>
                        <p class="card-text text-center mt-2"></p>
                        <img src="/images/room/{{ $room->image }}" class="card-img-top" alt="" style="border: solid 1px grey">
                        <h4 class="card-text text-center mt-3 "><strong class="bg-warning p-1">Rp. {{ number_format($room->price, 0, ',', '.') }}</strong> / malam</h4>
                        <p class="card-text text-center">{{ $room->facilities }}</p>
                        <p class="card-text text-center" style="margin-top: -20px;">Kapasitas: <strong>{{ $room->category->max_guests }} orang</strong></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-lg border-0 rounded">
                    <div class="card-body p-4">

                        <div class="mb-4">
                            <h4 class="h4 mb-0 text-gray-800 text-uppercase">Form Pemesanan Kamar</h4>
                            @if(session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif   
                        </div>
                        
                        <form action="/booking/store/{{ $room->code_room }}" method="POST">
                            @csrf
                        
                            <div class="mb-3">
                                <label for="check_in_date" class="form-label">Tanggal Check-in</label>
                                <input type="date" name="check_in_date" id="check_in_date" 
                                    class="form-control @error('check_in_date') is-invalid @enderror" required 
                                    value="{{ old('check_in_date') }}">
                                @error('check_in_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="check_out_date" class="form-label">Tanggal Check-out</label>
                                <input type="date" name="check_out_date" id="check_out_date" 
                                    class="form-control @error('check_out_date') is-invalid @enderror" required 
                                    value="{{ old('check_out_date') }}">
                                @error('check_out_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="extra_bed" class="form-label">Tambahan Kasur</label>
                                <input type="number" name="extra_bed" id="extra_bed" 
                                    class="form-control @error('extra_bed') is-invalid @enderror" 
                                    required value="{{ old('extra_bed', 0) }}" min="0" max="2">
                                <small id="extra_bed_help" class="form-text text-muted">Max Tambahan Kasur: 2</small>
                                @error('extra_bed')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="total_price" class="form-label">Total Harga</label>
                                <input type="text" name="total_price" id="total_price" 
                                    class="form-control" readonly 
                                    value="{{ old('total_price') }}">
                            </div>
                            
                            <div class="mb-3">
                                <label for="payment_method" class="form-label">Metode Pembayaran</label>
                                <select name="payment_method" id="payment_method" 
                                    class="form-control @error('payment_method') is-invalid @enderror">
                                    <option value="" disabled {{ old('payment_method') ? '' : 'selected' }}>Pilih metode pembayaran:</option>
                                    <option value="bank_transfer" {{ old('payment_method') == 'bank_transfer' ? 'selected' : '' }}>Transfer Bank</option>
                                    <option value="qris" {{ old('payment_method') == 'qris' ? 'selected' : '' }}>QRIS</option>
                                </select>
                                @error('payment_method')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Detail Transfer Bank -->
                            <div id="bank_transfer_details" class="payment-details mb-3" style="display: none;">
                            <p><strong>Bank {{ $paymentMethod->bank_name }}</strong> - {{ $paymentMethod->account_number . '  a.n.  ' . $paymentMethod->account_holder }}</p>
                            </div>

                            <!-- Detail QRIS -->
                            <div id="qris_details" class="payment-details mb-3" style="display: none;">
                                <p>Scan QRIS untuk pembayaran:</p>
                                <img src="/images/paymentmethods/{{ $paymentMethod->qris_image }}" alt="QRIS Pembayaran" class="img-fluid">
                            </div>
                        
                            <div class="d-grid gap-2">
                                <button type="submit" style="border: 0px" class="btn-read-more">Lanjut ke Pembayaran</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

