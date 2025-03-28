@extends('admin.layout.main')

@section('container')

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800 text-uppercase">Form Edit Kamar</h1>
    </div>
    
    <div class="card shadow my-5">
        <div class="card-header bg-danger"></div>
        <div class="card-body">
            <form method="post" action="{{ $url.$room->code_room }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
    
                <!-- Nama Kamar -->
                <div class="form-group">
                    <label class="text-dark" for="name">Nama Kamar</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                           id="name" name="name" placeholder="Masukkan nama kamar" 
                           value="{{ old('name', $room->name) }}" required>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
    
                <!-- Tipe Kamar -->
                <div class="form-group">
                    <label class="text-dark" for="category_id">Tipe Kamar</label>
                    <select class="form-control @error('category_id') is-invalid @enderror" 
                            id="category_id" name="category_id" required>
                        <option value="" disabled>Pilih tipe kamar</option>
                        <option value="1" {{ old('category_id', $room->category_id) == '1' ? 'selected' : '' }}>Deluxe</option>
                        <option value="2" {{ old('category_id', $room->category_id) == '2' ? 'selected' : '' }}>Superior</option>
                        <option value="3" {{ old('category_id', $room->category_id) == '3' ? 'selected' : '' }}>Suite</option>
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
                           value="{{ old('price', $room->price) }}" required>
                    @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
    
                <!-- Fasilitas -->
                <div class="form-group">
                    <label class="text-dark" for="facilities">Fasilitas</label>
                    <input type="text" class="form-control @error('facilities') is-invalid @enderror" 
                           id="facilities" name="facilities" placeholder="Masukkan fasilitas kamar" 
                           value="{{ old('facilities', $room->facilities) }}" required>
                    @error('facilities')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
    
                <!-- Upload Gambar Kamar -->
                <div class="form-group">
                    <label class="text-dark" for="image">Upload Gambar Kamar</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror" 
                            id="image" name="image" accept="image/jpg, image/jpeg, image/webp" onchange="previewImage()">
                        <label class="custom-file-label text-white bg-danger" for="image">Pilih Gambar</label>
                    </div>
                    @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Format: JPG, JPEG, WebP. Maks: 1MB.</small>
                </div>
    
                <!-- Tempat Preview Gambar -->
                <div class="form-group">
                    <img id="preview" src="/images/room/{{ $room->image }}" class="img-thumbnail" style="max-width: 300px; max-height: 200px;">
                </div>
    
                <!-- Tombol Simpan dan Kembali -->
                <div class="form-group d-flex justify-content-end">
                    <button type="submit" class="btn btn-success mb-2 mx-2">Simpan</button>
                    <a href="/ourRoom" class="btn btn-secondary mb-2 mx-2">Kembali</a>
                </div>
    
            </form>
        </div>
    </div>
    
    </div>
    


@endsection