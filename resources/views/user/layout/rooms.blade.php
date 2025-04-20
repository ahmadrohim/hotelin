<section class="page-section section-texture" id="rooms">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="text-uppercase title-heading">Pilihan Kamar</h2>
            <div class="title-underline"></div>
            <h3 class="section-subheading subtitle">Pilih kamar terbaik untuk pengalaman menginap Anda.</h3>
        </div>

        @foreach($Rooms as $room)
        <div class="row pb-4">
            <div class="col-md-7">
                <div id="carouselRoom{{ $room->id }}" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner rounded-3 shadow" style="height: 350px; overflow: hidden;">
                        @forelse($room->images as $key => $image)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img src="/images/room/{{ $image->image }}"
                                     class="d-block w-100"
                                     alt="{{ $room->name_image }}"
                                     style="height: 350px; object-fit: cover;">
                            </div>
                        @empty
                            <div class="carousel-item active">
                                <img src="{{ asset('images/room/default.jpg') }}"
                                     class="d-block w-100"
                                     alt="Default"
                                     style="height: 350px; object-fit: cover;">
                            </div>
                        @endforelse
                    </div>
                    @if($room->images->count() > 1)
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselRoom{{ $room->id }}" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselRoom{{ $room->id }}" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                    @endif
                </div>
            </div>
            <div class="col-md-5 mt-3 mt-md-0">
               <div class="card shadow-sm border-0 rounded-4 mb-4">
                    <div class="card-body p-4">
                        <h3 class="fw-bold mb-3">{{ $room->name }}</h3>
                        <p class="text-muted mb-2">{{ $room->description }}</p>
                        <div class="mb-2">
                            <span><i class="fas fa-bed"></i> Tipe Tempat Tidur: <strong>{{ $room->bed_type }} </strong></span>
                            <br>
                            <span><i class="fas fa-users"></i> Maksimal Tamu: <strong> {{ $room->max_guest }} </strong></span>
                            <br>
                            <span><i class="fas fa-money-bill-wave"></i> Harga: <strong>Rp{{ number_format($room->price, 0, ',', '.') }}</strong></span>
                        </div>
                        <div class="mb-3 mt-2">
                            @foreach($room->facilities as $facility)
                                <span class="badge bg-warning text-dark border me-1 mb-1">{{ $facility->name }}</span>
                            @endforeach
                        </div>
                        <a href="https://wa.me/085870831024?text=Saya%20ingin%20memesan%20kamar%20{{ urlencode($room->name_image) }}" class="btn btn-outline-success rounded-pill px-4" target="_blank">
                            Pesan Kamar
                        </a>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
    </div>
</section>

