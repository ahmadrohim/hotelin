@extends('admin.layout.main')

@section('container')

<div class="container-fluid mt-4">
    <!-- Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800 text-uppercase">Detail Pengguna</h1>
    </div>

    <!-- Card Detail Pengguna -->
    <div class="card shadow-lg mb-5">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-user"></i> Informasi Pengguna
        </div>
        <div class="card-body px-4 py-4">
            <div class="row">
                <!-- Kolom Kiri -->
                <div class="col-md-6 mb-3">
                    <p><i class="fas fa-user mr-2 text-primary"></i> <strong>Nama:</strong> {{ $user->name }}</p>
                    <p><i class="fas fa-envelope mr-2 text-primary"></i> <strong>Email:</strong> {{ $user->email }}</p>
                    <p><i class="fas fa-phone mr-2 text-primary"></i> <strong>Telepon:</strong> {{ $user->phone }}</p>
                    <p><i class="fas fa-user-tag mr-2 text-primary"></i> <strong>Role:</strong> {{ $user->role->role_name }}</p>
                </div>

                <!-- Kolom Kanan -->
                <div class="col-md-6 mb-3">
                    <p><i class="fas fa-check-circle mr-2 text-primary"></i> <strong>Status Akun:</strong>
                        @if ($user->email_verified_at)
                            <span class="badge badge-success">Terverifikasi</span>
                        @else
                            <span class="badge badge-secondary">Belum Verifikasi</span>
                        @endif
                    </p>
                    <p><i class="fas fa-calendar-alt mr-2 text-primary"></i> <strong>Tanggal Daftar:</strong>
                        {{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}
                    </p>
                    <p><i class="fas fa-bed mr-2 text-primary"></i> <strong>Total Pemesanan:</strong> 
                        {{ $user->bookings->count() }} kali
                    </p>
                </div>
            </div>

            <hr>

           <!-- Tombol Aksi -->
        <div class="d-flex flex-wrap align-items-center mb-4">
            @if ($user->trashed())
                <form action="/users/restore/{{ $user->slug }}" method="POST" 
                    onsubmit="return confirm('Yakin ingin memulihkan akun ini?')" 
                    class="mr-2 mb-2">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-undo"></i> Pulihkan Akun
                    </button>
                </form>

                <form action="/users/forceDelete/{{ $user->slug }}" method="POST" 
                    onsubmit="return confirm('Data akan dihapus permanen. Lanjutkan?')" 
                    class="mr-2 mb-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i> Hapus Permanen
                    </button>
                </form>
            @else
                <a href="/users/edit/{{ $user->slug }}" 
                class="btn btn-warning mr-2 mb-2">
                    <i class="fas fa-edit"></i> Edit Pengguna
                </a>

                <form action="/users/destroy/{{ $user->slug }}" method="POST" 
                    onsubmit="return confirm('Hapus akun ini?')" 
                    class="mr-2 mb-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-user-slash"></i> Nonaktifkan Akun
                    </button>
                </form>
            @endif
        </div>

            


            <div class="mt-4">
                <a href="" class="btn btn-primary mb-3">
                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar Pemesanan
                </a>
            </div>
        </div>
    </div>
</div>

    
@endsection