<section class="page-section" id="services">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class=" text-uppercase title-heading">Fasilitas Hotelin</h2>
            <h3 class="section-subheading subtitle">Nikmati berbagai fasilitas eksklusif yang dirancang untuk kenyamanan dan pengalaman menginap terbaik Anda.</h3>
        </div>
        <div class="row">
            <!-- Layanan Spa -->
            @foreach($HotelFacilities as $Hotel)
            
            <div class="col-md-3 mb-4 mx-auto">
                <div class="service-item d-flex flex-column align-items-center text-center">
                    <div class="service-image" 
                         style="background-image: url('/images/services/{{ $Hotel->image }}'); width: 100%; height: 200px; background-size: cover; background-position: center; border-radius: 10px;">
                    </div>
                    <div class="service-content mt-3">
                        <h4 class="text-danger">{{ $Hotel->name }}</h4>
                        <p class="text-muted">{{ $Hotel->description }}</p>
                    </div>
                </div>
            </div>
            
            @endforeach

        </div>
    </div>
</section>
