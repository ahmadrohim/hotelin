@extends('admin.layout.main')

@section('container')
    
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800 text-uppercase">Form Tambah Kategori Wisata</h1>
    </div>

    <div class="card shadow my-5">
        <div class="card-header bg-danger"></div>
        <div class="card-body">
            <form method="post" action="/categoryAttraction/store">
                @csrf

                <div class="row mb-4">
                    <div class="col-md-6">
                        <!-- Nama Kategori Wisata -->
                        <div class="form-group">
                            <label class="text-dark" for="name">Nama Kategori</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                id="name" name="name" placeholder="Masukkan nama kategori wisata" 
                                value="{{ old('name') }}" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 d-flex align-items-end justify-content-end">
                        <!-- Tombol Simpan dan Kembali -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-success mb-2 mx-2">Tambah</button>
                            <a href="/categoryAttraction" class="btn btn-primary mb-2 mx-2">Kembali</a>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>


@endsection