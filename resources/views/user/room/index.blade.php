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
              <div class="card over">
                <img src="/images/gallery/1.webp" class="card-img-top" alt="..." style="height: 500px">
                <div class="card-body bg-warning">
                  <h5 class="card-title">{{ $r->name }}</h5>
                  <p class="card-text fs-4 text-danger"><strong>{{ 'Rp. ' . number_format($r->price, 2, '.', '.') }}</strong></p>
                  <p class="card-text">Fasilitas: {{ $r->facilities }}</p>
                  <p class="card-text">Status: <span class="{{ $r->availability_status = ($r->availability_status == 'available') ? 'text-success' : 'text-danger';}}">{{$r->availability_status = ($r->availability_status == 'available') ? 'Tersedia' : 'Tidak tersedia';}}</span></p>
                  <a href="" class="btn btn-primary">Pesan Kamar</a>
                </div>
              </div>
            </div>
            @endforeach
        </div>


    </div>
</section>

@endsection