<section class="page-section" id="testimonials">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="text-uppercase title-heading">Kata Mereka Tentang Hotelin</h2>
            <div class="title-underline"></div>
            <h3 class="section-subheading subtitle">Mengenal Lebih Dekat Tentang Hotel Kami</h3>
        </div>

        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($Feedbacks->chunk(3) as $chunkIndex => $chunk)
                <div class="carousel-item feedback {{ $chunkIndex == 0 ? 'active' : '' }}">
                    <div class="row">
                        @foreach ($chunk as $feedback)
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <p class="mb-4">"{{ $feedback->message }}"</p>
                                    <h6 class="text-end fw-bold">— {{ $feedback->name }}</h6>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Kontrol Navigasi -->
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
                <span class="visually-hidden">Sebelumnya</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
                <span class="visually-hidden">Berikutnya</span>
            </button>
        </div>
    </div>
</section>
