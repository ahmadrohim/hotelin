<section class="page-section section-texture" id="nearby-attractions">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="text-uppercase title-heading">Wisata Sekitar Hotel</h2>
            <div class="title-underline"></div>
            <h3 class="section-subheading subtitle">Temukan tempat menarik yang bisa Anda kunjungi di sekitar hotel kami.</h3>
        </div>
        @foreach($Attractions as $attraction)
        <div class="row mb-2 pb-4">
            <div class="col-md-7">
                <div id="carouselAttraction{{ $attraction->id }}" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner rounded-3 shadow align-items-center" style="height: 300px; overflow: hidden;">
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
                </div>
            </div>
            <div class="col-md-5 mt-3 mt-md-0">
                <h3 class="fw-bold">{{ $attraction->name }}</h3>
                <p class="text-muted mb-2">{{ $attraction->description }}</p>
                <div class="mb-3">
                    <strong>Kategori:</strong> {{ $attraction->category->name }} <br>
                </div>
                <a href="{{ $attraction->map_link }}" target="_blank" class="btn btn-outline-success rounded-pill px-4">
                    Lihat Lokasi
                </a>
            </div>
        </div>
        @endforeach
    </div>
</section>
