<section class="page-section section-texture" id="attractions">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="text-uppercase title-heading">Wisata Sekitar Hotel</h2>
            <div class="title-underline"></div>
            <p class="section-subheading subtitle">Temukan tempat menarik yang bisa Anda kunjungi di sekitar hotel kami.</p>
        </div>

        @foreach($Attractions as $attraction)
        <div class="row align-items-center mb-5 pb-4 border-bottom">
            <div class="col-md-7">
                <div id="carouselAttraction{{ $attraction->id }}" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner rounded-3 shadow-sm" style="height: 350px; overflow: hidden;">
                        @if($attraction->image)
                            <div class="carousel-item active">
                                <img src="/images/attractions/{{ $attraction->image }}"
                                     class="d-block w-100"
                                     alt="{{ $attraction->name }}"
                                     style="height: 350px; object-fit: cover;">
                            </div>
                        @else
                            <div class="carousel-item active">
                                <img src="{{ asset('images/attractions/default.jpg') }}"
                                     class="d-block w-100"
                                     alt="Default"
                                     style="height: 350px; object-fit: cover;">
                            </div>
                        @endif
                    </div>
                    @if($attraction->image)
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselAttraction{{ $attraction->id }}" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselAttraction{{ $attraction->id }}" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                    @endif
                </div>
            </div>
            <div class="col-md-5 mt-3 mt-md-0">
                <h3 class="fw-bold">{{ $attraction->name }}</h3>
                <p class="text-muted mb-2">{{ $attraction->description }}</p>
                <div class="mb-3">
                    <strong>Kategori:</strong> {{ $attraction->category->name }} <br>
                </div>
                <a href="{{ $attraction->map_link }}" target="_blank" class="btn btn-success rounded-pill px-4">
                    Lihat Lokasi
                </a>
                <div class="mt-2" style="border: 1px solid grey">
                <iframe
                    src="https://www.google.com/maps?q={{ urlencode($attraction->name) }}&output=embed"
                    width="100%" height="150" style="border:0;" allowfullscreen loading="lazy">
                </iframe>
                </div>

            </div>
        </div>
        @endforeach
    </div>
</section>
