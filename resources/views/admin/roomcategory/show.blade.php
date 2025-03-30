@extends('admin.layout.main')

@section('container')

<div class="container-fluid mt-4">
    <!-- Tombol Kembali -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800 text-uppercase">Detail Kategori</h1>
    </div>

    <div class="card shadow my-5">
        <div class="card-header bg-danger"></div>
        <div class="card-body">
            <div class="row no-gutters">
                <!-- Gambar Kamar -->
                <div class="col-md-6">
                    <div class="room-image-wrapper">
                        <img src="/images/categoriesroom/{{ $category->image }}" class="room-image img-fluid rounded" alt="Gambar {{ $category->name }}">
                    </div>
                </div>
                
                <!-- Detail Kamar -->
                <div class="col-md-6">
                    <div class="card-body text-dark">
                        <h2 class="card-title text-danger text-uppercase font-weight-bold">{{ $category->name }}</h2>
                        <p><i class="fas fa-barcode"></i> <strong>Kode Kategori:</strong> {{ $category->code_category_room }}</p>
                        <p><i class="fas fa-money-bill-wave"></i> <strong>Harga Mulai Dari:</strong> 
                            <span class="font-weight-bold">Rp {{ number_format($category->base_price, 0, ',', '.') }} / Malam</span>
                        </p>
                        <p><i class="fas fa-users"></i> <strong>Maksimal Tamu:</strong> {{ $category->max_guests }} Orang</p>
                        <hr>
                        <a href="/categoryRoom/edit/{{ $category->code_category_room }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                        <form action="/categoryRoom/destroy/{{ $category->code_category_room }}" class="d-inline" method="post">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Apakah anda yakin menghapus kategori kamar {{ $category->name }} ? Data yang dihapus tidak bisa dipulihkan!')" type="submit" class="btn btn-danger"> <i class="fas fa-trash"></i> Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row no-gutters">
                <a href="/categoryRoom" class="btn btn-primary mb-3">
                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar Kamar
                </a>
            </div>
        </div>
    </div>
</div>


@endsection