<section id="rooms" class="rooms_wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 section-title text-center mb-5">
                <h6></h6>
                <h3>Kategori Kamar</h3>
            </div>
        </div>

        <div class="row m-0">
            @foreach ($RoomCategory as $category)
            <div class="col-md-4 mb-4 mb-lg-0 card">
                <div class="room-item">
                    <img decoding="async" src="./images/room/{{ $category->image }}" class="img-fluid">
                    <div class="room-item-wrap">
                        <div class="room-content">
                            <h5 class="text-primary mb-lg-5 text-decoration-underline">{{ $category->name }}</h5>
                            <p class="text-white">{{$category->description}}</p>
                            <p class="text-white" style="margin-bottom: -20px">Harga mulai dari:</p>
                            <h5 class="text-warning fw-bold mt-lg-4"><strong>{{ 'Rp. '. number_format($category->base_price, 2, '.', '.')  }}</strong>/ Per Malam</h4>
                            <p class="text-white">Maksimal tamu per kamar: <span style="font-weight: bold;">{{ $category->max_guests }} orang</span></p>

                            <a href="/rooms/{{ $category->slug}}" class="main-btn border-white text-white mt-lg-5">Lihat Kamar</a>
                        </div>
                    </div> 
                </div> 
            </div>
            @endforeach

        </div>


    </div>
</section>