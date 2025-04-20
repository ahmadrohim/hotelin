@extends('admin.layout.main')

@section('container')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800 text-uppercase">Form Tambah Kamar</h1>
    </div>

    <div class="card shadow my-5">
        <div class="card-header bg-danger"></div>
        <div class="card-body">
            <form method="post" action="/rooms/store" enctype="multipart/form-data">
                @csrf

                <div class="row mb-4">
                    <div class="col-md-6">
                        <!-- Nama Kamar -->
                        <div class="form-group">
                            <label class="text-dark" for="name">Nama Kamar</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   id="name" name="name" placeholder="Masukkan nama kamar"
                                   value="{{ old('name') }}" required>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Maksimal Tamu -->
                        <div class="form-group">
                            <label class="text-dark" for="max_guest">Maksimal Jumlah Tamu</label>
                            <input type="number" class="form-control @error('max_guest') is-invalid @enderror"
                                   id="max_guest" name="max_guest" placeholder="Masukkan jumlah maksimal tamu"
                                   value="{{ old('max_guest') }}" required min="1">
                            @error('max_guest') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                       
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <!-- Harga per Malam -->
                        <div class="form-group">
                            <label class="text-dark" for="price">Harga per Malam (Rp)</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror"
                                   id="price" name="price" placeholder="Masukkan harga per malam"
                                   value="{{ old('price') }}" required min="0">
                            @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                          <!-- Tipe Tempat Tidur -->
                          <div class="form-group">
                            <label class="text-dark" for="bed_type">Tipe Tempat Tidur</label>
                            <select class="form-control @error('bed_type') is-invalid @enderror" id="bed_type" name="bed_type">
                                <option value="" selected disabled>Pilih tipe tempat tidur</option>
                                <option value="Queen" {{ old('bed_type') == 'Queen' ? 'selected' : '' }}>Queen</option>
                                <option value="King" {{ old('bed_type') == 'King' ? 'selected' : '' }}>King</option>
                                <option value="Twin" {{ old('bed_type') == 'Twin' ? 'selected' : '' }}>Twin</option>
                                <option value="Double" {{ old('bed_type') == 'Double' ? 'selected' : '' }}>Double</option>
                            </select>
                            @error('bed_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <!-- Deskripsi -->
                        <div class="form-group">
                            <label class="text-dark" for="description">Deskripsi Kamar</label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                    id="description" name="description" rows="4"
                                    placeholder="Tuliskan deskripsi kamar...">{{ old('description') }}</textarea>
                            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Fasilitas -->
                        <div class="form-group">
                            <label class="text-dark">Fasilitas Kamar</label>
                            <div class="row">
                                @foreach($facilities as $facility)
                                <div class="col-md-4 mb-2">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input"
                                            name="facilities[]" id="facility_{{ $facility->id }}"
                                            value="{{ $facility->id }}"
                                            {{ is_array(old('facilities')) && in_array($facility->id, old('facilities')) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="facility_{{ $facility->id }}">{{ $facility->name }}</label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @error('facilities') <div class="text-danger mt-2">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                         <!-- Upload Gambar (5 inputan) -->
                        <div class="form-group">
                            <label class="text-dark">Upload Gambar Kamar (maksimal 5 gambar)</label>

                            @for ($i = 1; $i <= 5; $i++)
                                <div class="mb-3">
                                    <label for="image{{ $i }}">Gambar {{ $i }}</label>
                                    <input type="file" class="form-control-file" id="image{{ $i }}" name="images[]" accept="image/*" onchange="previewSingleImage(this, 'preview{{ $i }}')">
                                    <img id="preview{{ $i }}" class="img-thumbnail mt-2 d-none" style="max-width: 150px;">
                                </div>
                            @endfor

                            @error('images')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-4">
                        <!-- Tombol -->
                        <div class="form-group d-flex ">
                            <button type="submit" class="btn btn-success mb-2 mx-2">Tambah</button>
                            <a href="/rooms" class="btn btn-primary mb-2 mx-2">Kembali</a>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>    


@endsection

