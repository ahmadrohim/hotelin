@extends('admin.layout.main')

@section('container')

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800 text-uppercase">Kelola Pengguna</h1>
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
            <strong>Edit Pengguna #{{ $user->name }}</strong>
        </div>
        <div class="card-body">
            <form method="POST" action="/users/update/{{ $user->code_user }}">
                @csrf
                @method('put')

                <!-- Informasi Umum -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label>Nama Pengguna</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label>Nomor WhatsApp</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $user->phone) }}">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div> 
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label>Kode Pengguna</label>
                        <input type="text" readonly class="form-control @error('code_user') is-invalid @enderror" name="code_user" value="{{ old('code_user', $user->code_user) }}">
                        @error('code_user')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="role_id">Role</label>
                        <select name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                            <option value="1" {{ $user->role_id == 1 ? 'selected' : '' }}>Admin</option>
                            <option value="2" {{ $user->role_id == 2 ? 'selected' : '' }}>Staf</option>
                            <option value="3" {{ $user->role_id == 3 ? 'selected' : '' }}>Customer</option>
                        </select>
                        @error('role_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                            <label>Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Kosongkan jika tidak ingin mengganti">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                </div>

                <!-- Tombol -->
                <div class="form-group d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-success mx-2">Simpan</button>

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
            </form>
        </div>
    </div>

</div>

    
@endsection