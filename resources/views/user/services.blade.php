<section id="services" class="services_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 section-title text-center mb-5">
                <h6>Kami Siap Melayani Anda</h6>
                <h3>Fasilitas Nyaman & Lengkap</h3>
            </div>
        </div>
        <div class="row align-items-center service-item-wrap">
            <div class="col-lg-7 p-lg-0">
                <!--Service Area Start-->
                <div class="tab-content" id="myTabContent">

                    @foreach($HotelFacilities as $Facilities)
                    <div class="tab-pane fade @if($loop->first) show active @endif" id="facility-{{ $Facilities->slug }}" role="tabpanel">
                        <img decoding="async" src="{{ asset('images/services/' . $Facilities->image) }}" alt="">
                    </div>
                    @endforeach

                    
                </div>
                <!--Service Area End-->
            </div>
            <div class="col-lg-5 position-relative">
                <!--Service Tab Menu Area Start-->
                <div class="service-menu-area">
                    <ul class="nav">
                        @foreach($HotelFacilities as $Facilities)
                            <li>
                                <a data-bs-toggle="tab" href="#facility-{{ $Facilities->slug }}" class="@if($loop->first) active @endif">
                                    <span class="service-icon">
                                        <img decoding="async" src="{{ asset('images/services/' . $Facilities->icon) }}" alt="">
                                    </span>
                                    <h5>{{ $Facilities->name }}</h5>
                                    <p>{{ $Facilities->description }}</p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!--Service Tab Menu Area End-->
            </div>
        </div>
    </div>

    {{-- <div class="counter mt-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 mb-lg-0 mb-md-0 mb-5">
                    <h1>
                        <span id="count1"></span>+
                    </h1>
                    <p>Happy Clients</p>
                </div>
                <div class="col-md-3 mb-lg-0 mb-md-0 mb-5">
                    <h1>
                        <span id="count2"></span>+
                        </h2>
                        <p>New Friendships</p>
                </div>
                <div class="col-md-3 mb-lg-0 mb-md-0 mb-5">
                    <h1>
                        <span id="count3"></span>+
                        </h2>
                        <p>Five Start Ratings</p>
                </div>
                <div class="col-md-3 mb-lg-0 mb-md-0 mb-5">
                    <h1>
                        <span id="count4"></span>+
                        </h2>
                        <p>Served Breakfast</p>
                </div>
            </div>
        </div>
    </div> --}}
</section>