
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotelin</title>

    <!-- FAVICON -->
    <link rel="icon" type="image/png" href="/images/favicon.png">

    <!-- Bootstrap 5 CDN Links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <!-- Custom File's Link -->
    {{-- <link rel="stylesheet" href="/css/style.css"> --}}
    <link rel="stylesheet" href="/css/hotel.css">
    <!-- Swiper.js Styles -->
    <style>
        .testimonial-slider {
            width: 100%;
            padding: 20px 0;
        }
        .swiper-slide {
            display: flex;
            justify-content: center;
        }
        .card {
            max-width: 500px;
            border-radius: 10px;
        }
        .stars {
            font-size: 18px;
            color: #FFD700;
        }
        .swiper-button-next, .swiper-button-prev {
            color: #000;
        }
        .swiper-pagination-bullet {
            background: #000;
        }
    </style>
  

</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="100">
    
    {{-- Navbar --}}
    @include('user.navbar')


    @yield('container')

    <!-- Footer section -->
   @include('user.footer')
    <!-- Footer section exit -->

    <!-- Bootstrap 5 JS CDN Links -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Custom Js Link -->
    <script src="/js/hotel.js"></script>

    {{-- my js --}}
    <script>
        document.querySelectorAll('.card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.querySelector('.overlay').style.background = 'rgba(0, 0, 0, 0.3)';
            });
            card.addEventListener('mouseleave', () => {
                card.querySelector('.overlay').style.background = 'rgba(0, 0, 0, 0)';
            });
        });

    </script>

<!-- Swiper.js Script -->
<script>
    var swiper = new Swiper(".testimonial-slider", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
                spaceBetween: 30,
            }
        }
    });
</script>

</body>

</html>

