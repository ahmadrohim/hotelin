<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Hotelin</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <!-- Tambahkan Swiper CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
        {{-- <link href="/css/styles2.css" rel="stylesheet" /> --}}
        <link href="/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="/css/style2.css">


        <style>
     
        </style>

    </head>
    <body id="page-top">

        <!-- Navigation-->
        @include('user.layout.navbar')

        <header id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($HeroSection as $hero)
                <div class="carousel-item active" style="background: url('/images/slider/{{ $hero->image }}') center/cover no-repeat;">
                    <div class="container d-flex flex-column justify-content-center align-items-center text-center text-white h-100">
                        <h1 class="fw-bold text-uppercase">{{ $hero->title }}</h1>
                        <p class="lead">{{ $hero->subtitle }}</p>
                        <a href="#rooms" class="btn btn-primary btn-lg text-uppercase">Pesan Sekarang</a>
                    </div>
                </div>
                @endforeach
             
            </div>
        
            <!-- Navigasi panah -->
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </header>
        
        
        <!-- Tentang Kami-->
        @include('user.layout.about')

          <!-- Rooms-->
        @include('user.layout.rooms')

        <!-- Services-->
        @include('user.layout.services')
        
        <!-- Gallery -->
        @include('user.layout.gallery')

        <!-- Testimonial->
        @include('user.layout.testimonial')

        <!-- Contact-->
       @include('user.layout.contact')

        <!-- Footer-->
       @include('user.layout.footer')


        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="/js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Tambahkan Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
        <script>
           
            window.addEventListener("scroll", function() {
                var navbar = document.querySelector(".navbar");
                if (window.scrollY === 0) {
                    navbar.classList.remove("scrolled");
                } else {
                    navbar.classList.add("scrolled");
                }
            });

            var swiper = new Swiper(".testimonial-slider", {
                slidesPerView: 1,
                spaceBetween: 10,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });

            var swiper = new Swiper(".gallery-slider", {
                slidesPerView: 1, /* Default: 1 gambar di mobile */
                spaceBetween: 20, /* Jarak antar gambar */
                loop: true, /* Slider berjalan terus */
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                breakpoints: {
                    768: { 
                        slidesPerView: 2, /* Tampilkan 2 gambar di tablet */
                    },
                    1024: { 
                        slidesPerView: 3, /* Tampilkan 3 gambar di desktop */
                    }
                }
            });
    
        </script>

        <!-- AOS Animation -->
       
      
        

        
        



    </body>
</html>
