@extends('user.layout.main')
@section('container')
<!-- Banner section -->
 <section id="home" class="banner_wrapper p-0">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide" style="background-image: url(./images/slider/slider2.webp);">
                <div class="slide-caption text-center">
                    <div>
                        <h1>Selamat Datang di Hotelin</h1>
                        <p>Pilihan Tepat untuk Kenyamanan Anda </p>
                    </div>
                </div>
            </div>
            <div class="swiper-slide" style="background-image: url(./images/slider/slider1.webp);">
                <div class="slide-caption text-center">
                    <div>
                        <h1>Selamat Datang di Hotelin</h1>
                        <p>Pilihan Tepat untuk Kenyamanan Anda </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <div class="container booking-area">
        <form class="row">
            <div class="col-lg mb-3 mb-lg-0">
                <input type="date" class="form-control" placeholder="Date">
            </div>
            <div class="col-lg mb-3 mb-lg-0">
                <input type="date" class="form-control" placeholder="Date">
            </div>
            <div class="col-lg mb-3 mb-lg-0">
                <select class="form-select">
                    <option selected>Adults</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </div>
            <div class="col-lg mb-3 mb-lg-0">
                <select class="form-select">
                    <option selected>Children</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </div>
            <div class="col-lg mb-3 mb-lg-0">
                <button type="submit" class="main-btn rounded-2 px-lg-3">Check Availability</button>
            </div>
        </form>
    </div>
</section>
<!-- Banner section exit -->

<!-- About section -->
<section id="about" class="about_wrapper">
    <div class="container">
        <div class="row flex-lg-row flex-column-reverse ">
            <div class="col-lg-6 text-center text-lg-start">
                <h3>Tentang Kami</h3>
                <p>{{ $hotel->description }}</p>
                {{-- <a href="#" class="main-btn mt-4">Jelajahi</a> --}}
            </div>
            <div class="col-lg-6 mb-4 mb-lg-0 ps-lg-4 text-center">
                <img decoding="async" src="images/about-img.svg" class="img-fluid" alt="About Us">
            </div>

        </div>
    </div>
</section>
<!-- About section exit -->

<!-- Rooms section -->
@include('user.rooms')
<!-- Rooms Section Exit -->

<!-- Services section -->
@include('user.services')
<!-- Services section Exit -->

<!-- Gallery section -->
@include('user.gallery')
<!-- Gallery Section Exit -->

<!-- Team section -->
{{-- <section id="team" class="team_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 section-title text-center mb-5">
                <h6>What I can do for you</h6>
                <h3>Our Special Staff</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card p-0 rounded-3">
                    <img decoding="async" src="images/team/team1.webp" class="img-fluid rounded-3" />
                    <div class="team-info">
                        <h5>Shirley Gibson</h5>
                        <p>Manager</p>
                        <ul class="social-network">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card p-0 rounded-3">
                    <img decoding="async" src="images/team/team2.webp" class="img-fluid rounded-3" />
                    <div class="team-info">
                        <h5>Ronald Long</h5>
                        <p>Chif Reciption Officer</p>
                        <ul class="social-network">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card p-0 rounded-3">
                    <img decoding="async" src="images/team/team3.webp" class="img-fluid rounded-3" />
                    <div class="team-info">
                        <h5>Ashley Sanchez</h5>
                        <p>Master Chef</p>
                        <ul class="social-network">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card p-0 rounded-3">
                    <img decoding="async" src="images/team/team4.webp" class="img-fluid rounded-3" />
                    <div class="team-info">
                        <h5>Jessica Watson</h5>
                        <p>Housekeeping</p>
                        <ul class="social-network">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- Team Section Exit  -->



<!-- Pricing section -->
{{-- <section id="price" class="price_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 section-title text-center mb-5">
                <h6>Best & Affordable Price for you</h6>
                <h3>Our Pricing</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card p-4 text-center rounded-3">
                    <h5 class="text-decoration-underline mb-4">Economic</h5>
                    <ul class="list-unstyled">
                        <li>
                            <p>Flight Ticket(2)</p>
                        </li>
                        <li>
                            <p>Music Concert (30% Off)</p>
                        </li>
                        <li>
                            <p>Restaurant (Snacks)</p>
                        </li>
                        <li>
                            <p>Face Make(No)</p>
                        </li>
                    </ul>
                    <hr />
                    <h3>$150<sub class="fs-6 fw-normal">/NIGHT</sub></h3>
                    <a href="#" class="main-btn">Sign Up</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card p-4 text-center rounded-3">
                    <h5 class="text-decoration-underline mb-4">Economic</h5>
                    <ul class="list-unstyled">
                        <li>
                            <p>Flight Ticket(2)</p>
                        </li>
                        <li>
                            <p>Music Concert (30% Off)</p>
                        </li>
                        <li>
                            <p>Restaurant (Snacks)</p>
                        </li>
                        <li>
                            <p>Face Make(No)</p>
                        </li>
                    </ul>
                    <hr />
                    <h3>$150<sub class="fs-6 fw-normal">/NIGHT</sub></h3>
                    <a href="#" class="main-btn">Sign Up</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card p-4 text-center rounded-3">
                    <h5 class="text-decoration-underline mb-4">Economic</h5>
                    <ul class="list-unstyled">
                        <li>
                            <p>Flight Ticket(2)</p>
                        </li>
                        <li>
                            <p>Music Concert (30% Off)</p>
                        </li>
                        <li>
                            <p>Restaurant (Snacks)</p>
                        </li>
                        <li>
                            <p>Face Make(No)</p>
                        </li>
                    </ul>
                    <hr />
                    <h3>$150<sub class="fs-6 fw-normal">/NIGHT</sub></h3>
                    <a href="#" class="main-btn">Sign Up</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card p-4 text-center rounded-3">
                    <h5 class="text-decoration-underline mb-4">Economic</h5>
                    <ul class="list-unstyled">
                        <li>
                            <p>Flight Ticket(2)</p>
                        </li>
                        <li>
                            <p>Music Concert (30% Off)</p>
                        </li>
                        <li>
                            <p>Restaurant (Snacks)</p>
                        </li>
                        <li>
                            <p>Face Make(No)</p>
                        </li>
                    </ul>
                    <hr />
                    <h3>$150<sub class="fs-6 fw-normal">/NIGHT</sub></h3>
                    <a href="#" class="main-btn">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- Pricing Section Exit  -->

<!-- Pricing section -->
{{-- <section id="blog" class="blog_wrapper pb-0">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 section-title text-center mb-5">
                <h6>Say Hello TO Our Visiters</h6>
                <h3>Our Blog</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card p-0 border-0 rounded-0">
                    <img decoding="async" src="images/blog/blog1.webp" alt="">
                    <div class="blog-content bg-white p-4">
                        <h5 class="text-decoration-underline mb-4">Relax Zone</h5>
                        <h6>By Admin - February 18, 2018</h6>
                        <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, nostrum.
                        </p>
                        <a href="#" class="main-btn mt-2">Read More</a>

                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card p-0 border-0 rounded-0">
                    <img decoding="async" src="/images/blog/blog2.webp" alt="">
                    <div class="blog-content bg-white p-4">
                        <h5 class="text-decoration-underline mb-4">Relax Zone</h5>
                        <h6>By Admin - February 18, 2018</h6>
                        <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, nostrum.
                        </p>
                        <a href="#" class="main-btn mt-2">Read More</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="our-partner-slider mt-5">
        <div class="container swiper our-partner">
            <div class=" swiper-wrapper">
                <div class="swiper-slide"><img decoding="async" src="images/partners/brand1.webp"></div>
                <div class="swiper-slide"><img decoding="async" src="images/partners/brand2.webp"></div>
                <div class="swiper-slide"><img decoding="async" src="images/partners/brand3.webp"></div>
                <div class="swiper-slide"><img decoding="async" src="images/partners/brand4.webp"></div>
                <div class="swiper-slide"><img decoding="async" src="images/partners/brand5.webp"></div>
                <div class="swiper-slide"><img decoding="async" src="images/partners/brand6.webp"></div>
            </div>
        </div>
    </div>
</section> --}}
<!-- Pricing Section Exit  -->

@endsection