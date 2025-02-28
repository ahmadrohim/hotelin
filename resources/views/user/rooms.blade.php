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
                
           
            <div class="col-md-4 mb-4 mb-lg-0">
                <div class="room-item">
                    <img decoding="async" src="./images/room/{{ $category->image }}" class="img-fluid">
                    <div class="room-item-wrap">
                        <div class="room-content">
                            <h5 class="text-white mb-lg-5 text-decoration-underline">{{ $category->name }}</h5>
                            <p class="text-white">Discover five of our favourite dresses from our new collection that
                                are destined to be worn and loved immediately</p>
                            <p class="text-white fw-bold mt-lg-4">$220 / Per Night</p>
                            <a href="/rooms/{{ $category->slug}}" class="main-btn border-white text-white mt-lg-5">Lihat Kamar</a>

                        </div>
                    </div> 
                </div> 
            </div>

            @endforeach

        </div>


    </div>
</section>