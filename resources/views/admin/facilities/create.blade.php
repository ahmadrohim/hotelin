@extends('admin.layout.main')

@section('container')
    
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800 text-uppercase">Form Tambah Fasilitas</h1>
    </div>

    <div class="card shadow my-5">
        <div class="card-header bg-danger"></div>
        <div class="card-body">
            <form method="post" action="/facilities/store" enctype="multipart/form-data">
                @csrf

                <div class="row mb-4">
                    <div class="col-md-6">
                        <!-- Nama Fasilitas -->
                        <div class="form-group">
                            <label class="text-dark" for="name">Nama Fasilitas</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="name" name="name" placeholder="Masukkan nama fasilitas"
                                value="{{ old('name') }}" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                            <!-- Deskripsi -->
                            <div class="form-group">
                                <label class="text-dark" for="description">Deskripsi Fasilitas</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                                    name="description" rows="4" placeholder="Masukkan deskripsi fasilitas" required>{{ old('description') }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                    
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-dark" for="image">Upload Gambar Fasilitas</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror"
                                    id="image" name="image" accept="image/jpg,image/jpeg,image/webp" required onchange="previewImage()">
                                <label class="custom-file-label text-white bg-danger" for="image">Pilih Gambar</label>
                            </div>
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Format: JPG, JPEG, WEBP. Maksimal 1MB.</small>
                        </div>

                        <div class="form-group">
                            <img id="preview" src="" class="img-thumbnail d-none" style="max-width: 300px; max-height: 200px;">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                            <!-- Tombol -->
                            <div class="form-group d-flex justify-content-end">
                                <button type="submit" class="btn btn-success mb-2 mx-2">Tambah</button>
                                <a href="/facilities" class="btn btn-primary mb-2 mx-2">Kembali</a>
                            </div>
                    </div>
                </div>
                
            </form>
        </div>
    </div>

</div>

@endsection