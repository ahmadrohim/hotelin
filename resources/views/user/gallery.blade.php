<section id="gallery" class="gallery_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 section-title text-center mb-5">
                <h3>Galeri Foto Hotelin</h3>
            </div>
        </div>
        <div class="row g-3">
            {{-- @foreach($Gallery as $G)
            <div class="col-lg-3 col-md-6 gallery-item">
                <img decoding="async" src="./images/gallery/{{ $G->image }}" class="img-fluid w-100" style="height: 300px">
                <div class="gallery-item-content"></div>
            </div>
            @endforeach --}}

            @foreach($Gallery as $G)
                <div class="col-lg-3 col-md-6 gallery-item">
                    <img decoding="async" src="./images/gallery/{{ $G->image }}" class="img-fluid w-100" style="height: 300px">
                    <div class="gallery-item-content text-center p-2">
                        <h5 class="mt-2 text-white">{{ $G->title }}</h5>
                        <p class="text-white">{{ $G->description }}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>