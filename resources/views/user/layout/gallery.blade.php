<!-- Section Galeri -->
<section class="page-section" id="gallery">
    <div class="container">
        <div class="text-center">
            <h2 class="text-uppercase title-heading">Galeri Hotelin</h2>
            <h3 class="section-subheading subtitle">Lihat berbagai momen istimewa di hotel kami.</h3>
        </div>
        <div class="swiper gallery-slider">
            <div class="swiper-wrapper">
                @foreach($Gallery as $Gal)
                <div class="swiper-slide">
                    <div class="gallery-item-wrapper">
                        <a href="/images/gallery/{{ $Gal->image }}" class="gallery-item" data-lightbox="gallery">
                            <img class="img-fluid rounded gallery-image" src="/images/gallery/{{ $Gal->image }}" alt="{{ $Gal->title }}" />
                            <div class="gallery-overlay">
                                <h4 class="gallery-title">{{ $Gal->title }}</h4>
                                <p class="gallery-description">{{ $Gal->description }}</p>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Navigasi Swiper -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
