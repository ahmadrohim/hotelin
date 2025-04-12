@extends('admin.layout.main')

@section('container')


<div class="container-fluid mt-4">
    <!-- Tombol Kembali -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800 text-uppercase">Detail Kamar</h1>
    </div>

    <div class="card shadow my-5">
        <div class="card-header bg-danger">
        </div>
        <div class="card-body">
            
            <!-- Card Detail Kamar -->
       
            <div class="row no-gutters">
                <!-- Gambar Kamar -->
                <div class="col-md-6">
                    <div class="room-image-wrapper">
                        <img src="/images/room/{{ $room->image }}" class="room-image img-fluid rounded" alt="Gambar {{ $room->name }}">
                    </div>
                </div>
    
                <!-- Detail Kamar -->
                <div class="col-md-6">
                    <div class="card-body text-dark">
                        <h2 class="card-title text-danger text-uppercase font-weight-bold">{{ $room->name }}</h2>
    
                        <p><i class="fas fa-barcode"></i> <strong>Kode Kamar:</strong> {{ $room->code_room }}</p>
                        <p><i class="fas fa-door-closed"></i> <strong>Tipe Kamar:</strong> {{ $room->category->name }}</p>
                        <p><i class="fas fa-money-bill-wave"></i> <strong>Harga:</strong> 
                            <span class="font-weight-bold">Rp {{ number_format($room->price, 0, ',', '.') }} / Malam</span>
                        </p>
    
                        <!-- Status Ketersediaan -->
                        <p>
                            <i class="fas fa-info-circle"></i> <strong>Status:</strong>
                            <span class="badge {{ $room->availability_status == 'available' ? 'badge-success' : 'badge-danger' }} p-2">
                                {{ $room->availability_status == 'available' ? 'Tersedia' : 'Tidak Tersedia' }}
                            </span>
                        </p>

                        <!-- Fasilitas -->
                        <div class="d-flex flex-wrap">
                            <p><i class="fas fa-concierge-bell"></i> <strong>Fasilitas:</strong>  @foreach(explode(',', $room->facilities) as $facility)
                                <span class="badge badge-pill badge-info px-3 py-2 m-1">
                                    <i class="fas fa-check-circle"></i> {{ trim($facility) }}
                                </span>
                            @endforeach</p>
                        </div>
                        <hr>

                        <div class="mt-3 d-flex justify-content-between">
                            <a href="/ourRoom" class="btn btn-primary mb-3">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <div class="">
                                <a href="/room/edit/{{ $room->code_room }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <form action="/room/destroy/{{ $room->code_room }}" class="d-inline" method="post">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Apakah anda yakin menghapus data kamar {{ $room->name }} ? data yang dihapus tidak bisa dipulihkan!')" type="submit" class="btn btn-danger"> <i class="fas fa-trash"></i></button>
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