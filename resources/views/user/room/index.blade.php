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
            <div class="col-lg-4 col-md-6 mb-4"> <!-- 3 kamar per baris -->
                <div class="room-box">
                    <img src="/images/gallery/{{ $room->image }}" class="room-image" alt="{{ $room->name }}">
                    <div class="room-info">
                        <h5 class="room-title badge bg-dark">{{ $room->name }}</h5>
                        <p class="room-price">Mulai dari <strong>Rp. {{ number_format($room->price, 0, ',', '.') }}</strong> / malam</p>
                        <p class="room-facilities">{{ $room->facilities }}</p>
                        <p class="room-code"><i class="fas fa-key"></i> Kode Kamar: <strong>{{ $room->code_room }}</strong></p>
                        <a href="/rooms/{{ $room->code_room }}" class="btn-read-more">Pesan Kamar</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>



@endsection

