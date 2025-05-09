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
            <form method="post" action="{{ $url }}" enctype="multipart/form-data">
                @csrf

                <div class="row mb-4">
                    <div class="col-md-6">
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
                    </div>
                    <div class="col-md-6">
                         <!-- Tipe Kamar -->
                        <div class="form-group">
                            <label class="text-dark" for="category_id">Tipe Kamar</label>
                            <select class="form-control @error('category_id') is-invalid @enderror" 
                                    id="category_id" name="category_id" required>
                                <option value="" disabled selected>Pilih tipe kamar</option>
                                @foreach($roomCategory as $category)
                                <option value="{{ $category->id }}" 
                                        data-price="{{ $category->base_price }}" 
                                        {{ old('category_id') ==  $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <!-- Fasilitas -->
                        <div class="form-group">
                            <label class="text-dark" for="facilities">Fasiitas</label>
                            <input type="text" class="form-control @error('facilities') is-invalid @enderror" 
                            id="facilities" name="facilities" placeholder="Masukkan fasilitas kamar" 
                            value="{{ old('facilities') }}" required>
                            @error('facilities')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Harga per Malam -->
                        <div class="form-group">
                            <label class="text-dark" for="price">Harga per Malam (Rp) | Harga Minimum : <strong id="base_price_text">Rp 0</strong></label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" 
                                id="price" name="price" placeholder="Masukkan harga kamar per malam" 
                                value="{{ old('price') }}" required min="0">
                            @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-6">
                         <!-- Upload Gambar Kamar -->
                        <div class="form-group">
                            <label class="text-dark" for="image">Upload Gambar Kamar</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" 
                                    id="image" name="image" accept="image/jpg, image/jpeg, image/webp" required onchange="previewImage()">
                                <label class="custom-file-label text-white bg-danger" for="image">Pilih Gambar</label>
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
                    </div>
                    <div class="col-md-6">
                         <!-- Tombol Simpan dan Kembali -->
                        <div class="form-group d-flex justify-content-end">
                            <button type="submit" class="btn btn-success mb-2 mx-2">Tambah</button>
                            <a href="/ourRoom" class="btn btn-primary mb-2 mx-2">Kembali</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>

@endsection

