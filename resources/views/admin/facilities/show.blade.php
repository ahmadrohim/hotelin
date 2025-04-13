@extends('admin.layout.main')

@section('container')

<div class="container-fluid mt-4">
    <!-- Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800 text-uppercase">Detail Fasilitas</h1>
    </div>

    <!-- Card Detail Fasilitas -->
    <div class="card shadow my-5">
        <div class="card-header bg-danger"></div>
        <div class="card-body">
            <div class="row no-gutters">
                <!-- Gambar Fasilitas -->
                <div class="col-md-6">
                    <div class="room-image-wrapper text-center">
                        <img src="/images/services/{{ $facilities->image }}"
                             class="img-fluid rounded" style="max-height:300px;"
                             alt="Gambar {{ $facilities->name }}">
                    </div>

                    <div class="mt-3 text-center">
                        <h4 class="card-title text-dark text-uppercase font-weight-bold">
                            {{ $facilities->name }}
                        </h4>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="mt-3 text-center">
                            <a href="/facilities/edit/{{ $facilities->code_facilities }}" class="btn btn-warning mx-1">Edit</a>
                            <form action="/facilities/destroy/{{ $facilities->code_facilities }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus fasilitas ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger mx-1" type="submit">Hapus</button>
                            </form>
                    </div>
                </div>

                <!-- Deskripsi & Detail -->
                <div class="col-md-6">
                    <div class="card-body text-dark">
                        <p><i class="fas fa-code"></i> <strong>Kode Fasilitas:</strong> {{ $facilities->code_facilities }}</p>

                        <p><i class="fas fa-align-left"></i> <strong>Deskripsi:</strong><br>
                            {!! nl2br(e($facilities->description)) !!}
                        </p>

                        <p><i class="fas fa-calendar-plus"></i> <strong>Ditambahkan pada:</strong> 
                            {{ \Carbon\Carbon::parse($facilities->created_at)->format('d M Y H:i') }}
                        </p>

                        @if ($facilities->updated_at && $facilities->updated_at != $facilities->created_at)
                        <p><i class="fas fa-edit"></i> <strong>Diperbarui:</strong> 
                            {{ \Carbon\Carbon::parse($facilities->updated_at)->format('d M Y H:i') }}
                        </p>
                        @endif

                        <hr>
                        <div class="mt-3">
                            <a href="/facilities" class="btn btn-primary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

    
@endsection