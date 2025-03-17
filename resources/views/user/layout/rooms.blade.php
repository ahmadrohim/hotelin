<!-- Bagian Kamar di Beranda -->
<section class="page-section section-texture" id="rooms">
    <div class="container">
        <div class="text-center">
            <h2 class="text-uppercase title-heading">Pilihan Kamar</h2>
            <h3 class="section-subheading subtitle">Temukan kenyamanan terbaik dengan berbagai pilihan kamar kami.</h3>
        </div>

        <div class="row">

            @foreach($RoomCategory as $Room)
            <!-- Kamar 1 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm" style="color:white; border:none;">
                    <img src="/images/room/{{ $Room->image }}" class="card-img-top" alt="Kamar Deluxe">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $Room->name }}</h5>
                        <p class="card-text">Mulai dari <strong>Rp. {{ number_format($Room->base_price, 0, ',', '.') }}</strong> / malam</p>
                        <p class="card-text"><strong>Kapasitas:</strong> {{ $Room->max_guests }} orang</p> <!-- Menambahkan kapasitas tamu -->
                        <a href="kamar.html" class=" btn-read-more">Lihat Kamar</a>
                    </div>
                </div>
            </div>            
            @endforeach
        </div>
    </div>
</section>