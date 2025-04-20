@extends('admin.layout.main')

@section('container')


<div class="container-fluid mt-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800 text-uppercase">Detail Kamar</h1>
    </div>

    <div class="card shadow my-5">
        <div class="card-header bg-danger"></div>
        <div class="card-body">
            <div class="row">
                <!-- Carousel Gambar Kamar -->
                <div class="col-md-6">
                    <div id="roomImageCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" style="height: 300px; overflow: hidden;">
                            @foreach($room->images as $key => $image)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img src="/images/room/{{ $image->image }}" class="d-block w-100 rounded" alt="Gambar {{ $room->name }} - {{ $key + 1 }}" style="height: 300px; object-fit: cover;">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#roomImageCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Sebelumnya</span>
                        </a>
                        <a class="carousel-control-next" href="#roomImageCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Berikutnya</span>
                        </a>
                    </div>
                </div>

                <!-- Detail Kamar -->
                <div class="col-md-6">
                    <div class="card-body text-dark">
                        <h2 class="card-title text-danger text-uppercase font-weight-bold">{{ $room->name }}</h2>

                        <p><i class="fas fa-barcode"></i> <strong>Kode Kamar:</strong> {{ $room->code_room }}</p>
                        <p><i class="fas fa-money-bill-wave"></i> <strong>Harga:</strong> 
                            <span class="font-weight-bold">Rp {{ number_format($room->price, 0, ',', '.') }} / Malam</span>
                        </p>
                        <p><i class="fas fa-users"></i> <strong>Maksimal Tamu:</strong> {{ $room->max_guest }} orang</p>
                        <p><i class="fas fa-bed"></i> <strong>Tipe Tempat Tidur:</strong> {{ $room->bed_type ?? '-' }}</p>
                        <p><i class="fas fa-align-left"></i> <strong>Deskripsi:</strong><br> {{ $room->description ?? 'Tidak ada deskripsi.' }}</p>

                        <!-- Fasilitas -->
                        <div class="d-flex flex-wrap">
                            <p><i class="fas fa-concierge-bell"></i> <strong>Fasilitas:</strong>
                                @foreach($room->facilities as $facility)
                                    <span class="badge bg-warning text-white border me-1 mb-1"> <i class="fas fa-check-circle"></i>{{ $facility->name }}</span>
                                @endforeach
                            </p>
                        </div>
                        <hr>

                        <!-- Tombol -->
                        <div class="mt-3 d-flex justify-content-between">
                            <a href="/rooms" class="btn btn-primary mb-3">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <div>
                                <a href="/rooms/edit/{{ $room->code_room }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <form action="/rooms/destroy/{{ $room->code_room }}" class="d-inline" method="post">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Apakah anda yakin menghapus data kamar {{ $room->name }} ? data yang dihapus tidak bisa dipulihkan!')" type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </div>
</div>


@endsection