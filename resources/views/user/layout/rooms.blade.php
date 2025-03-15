<!-- Bagian Kamar di Beranda -->
<section class="page-section" style="background-color: #cbeed6" id="kamar">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Pilihan Kamar</h2>
            <p class="text-muted">Temukan kenyamanan terbaik dengan berbagai pilihan kamar kami.</p>
        </div>
        <div class="row">

            @foreach($RoomCategory as $Room)
            <!-- Kamar 1 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm">
                    <img src="/images/room/{{ $Room->image }}" class="card-img-top" alt="Kamar Deluxe">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $Room->name }}</h5>
                        <p class="card-text text-muted">Mulai dari <strong>Rp. {{ number_format($Room->base_price, 0, ',', '.') }}</strong> / malam</p>
                        <a href="kamar.html" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>