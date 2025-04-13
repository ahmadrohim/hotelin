@extends('admin.layout.main')

@section('container')

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800 text-uppercase">Form Edit Fasilitas</h1>
    </div>

    <div class="card shadow my-5">
        <div class="card-header bg-danger"></div>
        <div class="card-body">
            <form method="POST" action="/facilities/update/{{ $facilities->code_facilities }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-4">
                    <div class="col-md-6">
                        <!-- Nama Fasilitas -->
                        <div class="form-group">
                            <label class="text-dark" for="name">Nama Fasilitas</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="name" name="name" placeholder="Masukkan nama fasilitas"
                                value="{{ old('name', $facilities->name) }}" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Deskripsi -->
                        <div class="form-group">
                            <label class="text-dark" for="description">Deskripsi Fasilitas</label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                id="description" name="description" rows="4"
                                placeholder="Masukkan deskripsi fasilitas" required>{{ old('description', $facilities->description) }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <!-- Gambar -->
                        <div class="form-group">
                            <label class="text-dark" for="image">Ganti Gambar Fasilitas</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror"
                                    id="image" name="image" accept="image/jpg,image/jpeg,image/webp" onchange="previewImage()">
                                <label class="custom-file-label text-white bg-danger" for="image">Pilih Gambar</label>
                            </div>
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti gambar. Format: JPG, JPEG, WEBP. Maksimal 1MB.</small>
                        </div>
                        
                    </div>

                    <div class="col-md-6">
                         <!-- Preview Gambar Lama -->
                      <div class="form-group">
                        <label class="text-dark d-block">Gambar Saat Ini:</label>
                        <img src="/images/services/{{ $facilities->image }}"
                            alt="Gambar Fasilitas" class="img-thumbnail mb-2" style="max-width: 300px; max-height: 200px;">
                    </div>

                    <!-- Preview Gambar Baru -->
                    <div class="form-group">
                        <img id="preview" class="img-thumbnail d-none" style="max-width: 300px; max-height: 200px;">
                    </div>
                    </div>

                    <!-- Tombol -->
                    <div class="form-group d-flex justify-content-end">
                        <button type="submit" class="btn btn-success mb-2 mx-2">Simpan</button>
                        <a href="/facilities" class="btn btn-primary mb-2 mx-2">Kembali</a>
                    </div>
                      
                </div>

            </form>
        </div>
    </div>

</div>
    
@endsection