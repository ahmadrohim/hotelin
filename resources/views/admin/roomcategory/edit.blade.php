@extends('admin.layout.main')

@section('container')

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800 text-uppercase">Form Edit Kategori</h1>
    </div>

    <div class="card shadow my-5">
        <div class="card-header bg-danger">
        </div>
        <div class="card-body">
            <form method="post" action="/categoryRoom/update/{{ $category->code_category_room }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Nama Kategori -->
                <div class="form-group">
                    <label class="text-dark" for="name">Nama Kategori</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                        id="name" name="name" placeholder="Masukkan nama kategori" 
                        value="{{ old('name', $category->name) }}" required>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Harga per Malam -->
                <div class="form-group">
                    <label class="text-dark" for="base_price">Harga Mulai Dari (Rp)</label>
                    <input type="number" class="form-control @error('base_price') is-invalid @enderror" 
                        id="base_price" name="base_price" placeholder="Masukkan harga awal" 
                        value="{{ old('base_price', $category->base_price) }}" required>
                    @error('base_price')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Maksimal Tamu -->
                <div class="form-group">
                    <label class="text-dark" for="max_guests">Maksimal Tamu</label>
                    <input type="text" class="form-control @error('max_guests') is-invalid @enderror" 
                    id="max_guests" name="max_guests" placeholder="Masukkan maksimal tamu" 
                    value="{{ old('max_guests', $category->max_guests) }}" required>
                    @error('max_guests')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Upload Gambar Kategori -->
                <div class="form-group">
                    <label class="text-dark" for="image">Upload Gambar Kategori Kamar</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror" 
                            id="image" name="image" accept="image/jpg, image/jpeg, image/webp" onchange="previewImage()">
                        <label class="custom-file-label text-white bg-danger" for="image">Pilih Gambar</label>
                    </div>
                    @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Format yang diperbolehkan: JPG, JPEG. Maksimal ukuran: 1MB.</small>
                </div>
                
                <!-- Tempat Preview Gambar -->
                <div class="form-group">
                    <img id="preview" src="/images/categoriesroom/{{ $category->image }}" class="img-thumbnail" style="max-width: 300px; max-height: 200px;">
                </div>

                <!-- Tombol Simpan dan Kembali -->
                <div class="form-group d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary mb-2 mx-2">Simpan</button>
                    <a href="/categoryRoom" class="btn btn-secondary mb-2 mx-2">Kembali</a>
                </div>
            </form>
        </div>
    </div>

</div>


@endsection