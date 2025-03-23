@extends('admin.layout.main')

@section('container')

<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mb-0 text-gray-800 text-uppercase">Form Tambah Kamar</h1>
</div>

<div class="card shadow my-5">
    <div class="card-header bg-danger">
    </div>
    <div class="card-body">
        <form method="post" action="/room/store" enctype="multipart/form-data">
            @csrf

            <!-- Nama Kamar -->
            <div class="form-group">
                <label class="text-dark" for="name">Nama Kamar</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                       id="name" name="name" placeholder="Masukkan nama kamar" 
                       value="{{ old('name') }}" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tipe Kamar -->
            <div class="form-group">
                <label class="text-dark" for="category_id">Tipe Kamar</label>
                <select class="form-control @error('category_id') is-invalid @enderror" 
                        id="category_id" name="category_id" required>
                    <option value="" disabled selected>Pilih tipe kamar</option>
                    <option value="1" {{ old('category_id') == '1' ? 'selected' : '' }}>Deluxe</option>
                    <option value="2" {{ old('category_id') == '2' ? 'selected' : '' }}>Superior</option>
                    <option value="3" {{ old('category_id') == '3' ? 'selected' : '' }}>Suite</option>
                </select>
                @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

                 <!-- Harga per Malam -->
                 <div class="form-group">
                    <label class="text-dark" for="price">Harga per Malam (Rp)</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" 
                           id="price" name="price" placeholder="Masukkan harga kamar per malam" 
                           value="{{ old('price') }}" required>
                    @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            <!-- Fasilitas -->
            <div class="form-group">
                <label class="text-dark" for="facilities">Fasiitas</label>
                <input class="form-control @error('facilities') is-invalid @enderror" 
                          id="facilities" name="facilities" placeholder="Masukkan fafilitas kamar" 
                          rows="3">{{ old('facilities') }}</input>
                @error('facilities')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Upload Gambar Kamar -->
            <div class="form-group">
                <label class="text-dark" for="image">Upload Gambar Kamar</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" 
                        id="image" name="image" accept="image/jpg, image/jpeg, image/png" required onchange="previewImage()">
                    <label class="custom-file-label text-white bg-success" for="image">Pilih Gambar</label>
                </div>
                @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="form-text text-muted">Format yang diperbolehkan: JPG, JPEG. Maksimal ukuran: 1MB.</small>
            </div>
            
            <!-- Tempat Preview Gambar -->
            <div class="form-group">
                <img id="preview" src="" class="img-thumbnail d-none" style="max-width: 300px; max-height: 200px;">
            </div>

            <!-- Tombol Simpan dan Kembali -->
            <div class="form-group d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mb-2 mx-2">Tambah</button>
                <a href="/ourRoom" class="btn btn-secondary mb-2 mx-2">Kembali</a>
            </div>

        </form>
    </div>
</div>


</div>

@endsection