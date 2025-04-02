@extends('user.layout.main')

@section('content')

<!-- Bagian Kamar Berdasarkan Kategori -->
<!-- Bagian Kamar -->
<section class="page-section section-texture" id="rooms">
    <div class="container">
        <br>
        <div class="text-center">
            <h2 class="text-uppercase title-heading">Pilihan Kamar {{ $room->name }}</h2>
            <h3 class="section-subheading subtitle">Temukan kenyamanan terbaik dengan berbagai pilihan kamar kami.</h3>
        </div>

        <div class="row">
            @foreach($rooms as $room)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm">
                    <img src="/images/room/{{ $room->image }}" class="card-img-top" alt="{{ $room->category->name }}">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $room->name }}</h5>
                        <p class="card-text">Harga: <strong>Rp. {{ number_format($room->price, 0, ',', '.') }}</strong> / malam</p>
                        <p class="room-facilities">{{ $room->facilities }}</p>
                        <p class="card-text">Kapasitas: <strong>{{ $room->category->max_guests }} orang </strong></p>
                        <a href="/booking/create/{{ $room->code_room }}" class="btn-read-more">Pesan Kamar</a>
                    </div>
                </div>
            </div>  
            @endforeach
        </div>
    </div>
</section>



@endsection

