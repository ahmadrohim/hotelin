@extends('user.layout.main')

@section('container')

<section id="rooms" class="rooms_wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 section-title text-center mb-5">
                <h6></h6>
                <h3>Kategori Kamar <span class="text-uppercase text-white bg-danger badge">{{ $room->name }}</span></h3>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4 p-4">
          @foreach ($rooms as $r)
          <div class="col">
            <div class="card over" style="overflow: hidden;">
                <img src='/images/gallery/{{ $r->image }}' class="card-img-top" alt="..." 
                    style="height: 300px; transition: transform 0.3s ease-in-out, filter 0.3s ease-in-out; filter: brightness(100%);" 
                    onmouseover="this.style.transform='scale(1.1)'; this.style.filter='brightness(70%)'" 
                    onmouseout="this.style.transform='scale(1)'; this.style.filter='brightness(100%)'">
                <div class="card-body">
                    <h5 class="card-title d-flex justify-content-between align-items-center">
                        {{ $r->name }}
                        <span style="font-size: 15px" class="badge {{ $r->availability_status == 'available' ? 'bg-success' : 'bg-danger' }} text-white">
                            Status: {{ $r->availability_status == 'available' ? 'Tersedia' : 'Tidak Tersedia' }}
                        </span>
                    </h5>
                    <p class="card-text fs-4 text-danger"><strong>{{ 'Rp. ' . number_format($r->price, 2, '.', '.') }}</strong></p>
                    <p class="card-text">Fasilitas: {{ $r->facilities }}</p>
                    <a href="" class="btn btn-primary">Pesan Kamar</a>
                </div>
            </div>
        </div>
          @endforeach
        </div>


    </div>
</section>

@endsection