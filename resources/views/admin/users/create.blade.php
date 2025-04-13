@extends('admin.layout.main')

@section('container')

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800 text-uppercase">Form Tambah Pengguna</h1>
    </div>

    <div class="mb-4">
        @if(session()->has("success") || session()->has("error"))
        <div class="alert alert-{{ session()->has("success") ? 'success' : 'danger' }} alert-dismissible fade show" role="alert">
            {{ session("success") ?? session("error") }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>
    
    <div class="card shadow mb-4">
        <div class="card-header bg-danger text-white">
        </div>
        <div class="card-body">
            <form method="POST" action="/store">
                @csrf
                <input type="hidden" name="via_admin" value="1">
                <!-- Informasi Umum -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label>Nama Pengguna</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Masukan nama kamu...">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label>Nomor WhatsApp</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Masukan no WA kamu...">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div> 
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="role_id">Role</label>
                        <select name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                            <option value="1" >Admin</option>
                            <option value="2" >Staf</option>
                            <option value="3" selected>Customer</option>
                        </select>
                        @error('role_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label>Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukan password yang kuat...">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukan email kamu...">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <!-- Tombol -->
                        <div class="form-group d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-success mx-2">Tambah</button>

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
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection