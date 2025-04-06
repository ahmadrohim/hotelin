@extends('admin.layout.main')

@section('container')


<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800 text-uppercase">Kelola Status Pesanan</h1>
    </div>
    
    <div class="card shadow mb-4">
        <div class="card-header bg-danger text-white">
            <strong>Kode Pesanan #{{ $reservation->code_booking }}</strong>
        </div>
        <div class="card-body">
            <form method="POST" action="/reservation/update/{{ $reservation->code_booking }}">
                @csrf
                @method('put')

                <!-- Informasi Umum -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label>Nama Pemesan</label>
                        <input type="text" class="form-control" value="{{ $reservation->user->name }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label>Nama Kamar</label>
                        <input type="text" class="form-control" value="{{ $reservation->room->name }}" disabled>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label>Tanggal Check-in / Check-out</label>
                        <input type="text" class="form-control" value="{{ $reservation->check_in_date }} - {{ $reservation->check_out_date }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label>Total Harga</label>
                        <input type="text" class="form-control" value="Rp {{ number_format($reservation->total_price, 2, ',', '.') }}" disabled>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label>Metode Pembayaran</label>
                        <input type="text" class="form-control" value="{{ $reservation->payment_method ?? '-' }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label>Bukti Pembayaran</label><br>
                        @if($reservation->payment_proof)
                            <img src="/files/paymentproof/{{ $reservation->payment_proof }}" class="img-thumbnail" style="max-width: 250px;">
                        @else
                            <span class="text-muted">Belum ada</span>
                        @endif
                    </div>
                </div>

                <!-- Status yang Bisa Diedit -->
                <div class="row">
                    <div class="col-md-6">
                        <label for="payment_status">Status Pembayaran</label>
                        <select name="payment_status" class="form-control @error('payment_status') is-invalid @enderror">
                            <option value="pending" {{ $reservation->payment_status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="paid" {{ $reservation->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
                            <option value="failed" {{ $reservation->payment_status == 'failed' ? 'selected' : '' }}>Failed</option>
                        </select>
                        @error('payment_status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="status">Status Pesanan</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="pending" {{ $reservation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="confirmed" {{ $reservation->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="completed" {{ $reservation->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ $reservation->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Tombol -->
                <div class="form-group d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-success mx-2">Simpan</button>
                    <a href="/reservation" class="btn btn-primary mx-2">Kembali</a>
                </div>
            </form>
        </div>
    </div>

</div>



@endsection