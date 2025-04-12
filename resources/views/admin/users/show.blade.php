@extends('admin.layout.main')

@section('container')

<div class="container-fluid mt-4">
    <!-- Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800 text-uppercase">Detail Pengguna</h1>
    </div>

    <!-- Card Detail Pengguna -->
    <div class="card shadow my-5">
        <div class="card-header bg-danger">
            <h5 class="text-white m-0"><i class="fas fa-user-circle"></i> Informasi Pengguna</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Kolom Kiri: Detail Pengguna -->
                <div class="col-md-6">
                    <div class="text-dark">
                        <p><i class="fas fa-user"></i> <strong>Nama:</strong> {{ $user->name }}</p>
                        <p><i class="fas fa-id-card"></i> <strong>Slug:</strong> {{ $user->slug }}</p>
                        <p><i class="fas fa-envelope"></i> <strong>Email:</strong> {{ $user->email }}</p>
                        <p><i class="fas fa-check-circle"></i> <strong>Email Terverifikasi:</strong> 
                            {!! $user->email_verified_at ? '<span class="text-success">Ya</span>' : '<span class="text-danger">Belum</span>' !!}
                        </p>
                        <p><i class="fas fa-phone"></i> <strong>Telepon:</strong> {{ $user->phone }}</p>
                        <p><i class="fas fa-user-tag"></i> <strong>Role:</strong> {{ $user->role->role_name ?? '-' }}</p>
                    </div>
                </div>

                <!-- Kolom Kanan: Info Tambahan -->
                <div class="col-md-6">
                    <div class="card border-left-primary shadow py-2 mb-4">
                        <div class="card-body">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pemesanan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">3</div>
                        </div>
                    </div>

                  
                    @php
                        $from = request('from');
                        if ($from === 'admin') {
                            $backUrl = '/users/admin';
                        } elseif ($from === 'staf') {
                            $backUrl = '/users/staf';
                        } elseif ($from === 'customer') {
                            $backUrl = '/users/customer';
                        } else {
                            $backUrl = '/users';
                        }
                    @endphp

                    <a href="{{ $backUrl }}" class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i> Kembali ke Daftar Pengguna
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


    
@endsection