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
        <link rel="stylesheet" href="/css/styleku.css">


        <style>
     
        </style>

    </head>
    <body id="page-top">

        <!-- Navigation-->
        @include('user.layout.navbar')



        <!-- Content -->
        @yield('content')

       
         <!-- Contact-->
        @include('user.layout.contact')

        <!-- Footer -->
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

            document.getElementById('payment_proof').addEventListener('change', function(event){
                let fileName = event.target.files[0] ? event.target.files[0].name : 'Tidak ada file dipilih';
                document.getElementById('file-name').textContent = fileName;
            })

        </script>

        @if(request()->is('booking/create*'))  <!-- Pengecekan halaman create -->
        <script>
             document.addEventListener('DOMContentLoaded', function() {
                const roomPrice = {{ $room->price }}; // Harga kamar per malam
                const extraBedPrice = 50000; // Harga per extra bed per malam

                let checkInInput = document.getElementById('check_in_date');
                let checkOutInput = document.getElementById('check_out_date');
                let extraBedInput = document.getElementById('extra_bed');
                let totalPriceInput = document.getElementById('total_price');

                function calculateTotalPrice() {
                    let checkIn = new Date(checkInInput.value);
                    let checkOut = new Date(checkOutInput.value);
                    let extraBed = parseInt(extraBedInput.value) || 0; // Default 0 jika kosong
                    
                    // Hitung jumlah malam
                    let nights = (checkOut - checkIn) / (1000 * 60 * 60 * 24);
                    nights = nights > 0 ? nights : 1; // Minimal 1 malam

                    // Hitung total harga
                    let roomTotal = roomPrice * nights;
                    let extraBedTotal = extraBedPrice * extraBed * nights;
                    let totalPrice = roomTotal + extraBedTotal;

                    // Format ke Rupiah
                    totalPriceInput.value = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(totalPrice);
                }

                // Jalankan saat halaman dimuat
                calculateTotalPrice();

                // Tambahkan event listener untuk perubahan input
                checkInInput.addEventListener('change', calculateTotalPrice);
                checkOutInput.addEventListener('change', calculateTotalPrice);
                extraBedInput.addEventListener('input', calculateTotalPrice);
            });
            

            document.addEventListener('DOMContentLoaded', function () {
                let checkInInput = document.getElementById('check_in_date');
                let checkOutInput = document.getElementById('check_out_date');

                // Set tanggal hari ini sebagai minimal check-in
                let today = new Date().toISOString().split('T')[0];
                checkInInput.setAttribute('min', today);

                // Event listener untuk check-in date
                checkInInput.addEventListener('change', function () {
                    let checkInDate = checkInInput.value;
                    checkOutInput.setAttribute('min', checkInDate); // Check-out tidak bisa sebelum check-in
                });

                // Event listener untuk check-out date
                checkOutInput.addEventListener('change', function () {
                    let checkInDate = new Date(checkInInput.value);
                    let checkOutDate = new Date(checkOutInput.value);

                    if (checkOutDate <= checkInDate) {
                        alert("Tanggal check-out harus setelah tanggal check-in!");
                        checkOutInput.value = ''; // Reset input checkout
                    } else {
                        checkInInput.setAttribute('max', checkOutInput.value); // Check-in tidak bisa setelah check-out
                    }
                });
            });

            document.getElementById('payment_method').addEventListener('change', function() {
                const bankTransferDetails = document.getElementById('bank_transfer_details');
                const qrisDetails = document.getElementById('qris_details');
                
                // Cek pilihan metode pembayaran
                if (this.value === 'bank_transfer') {
                    bankTransferDetails.style.display = 'block';  // Menampilkan detail transfer bank
                    qrisDetails.style.display = 'none';            // Menyembunyikan detail QRIS
                } else if (this.value === 'qris') {
                    qrisDetails.style.display = 'block';          // Menampilkan detail QRIS
                    bankTransferDetails.style.display = 'none';   // Menyembunyikan detail transfer bank
                } else {
                    bankTransferDetails.style.display = 'none';   // Menyembunyikan keduanya
                    qrisDetails.style.display = 'none';
                }
            });




        </script>
        @endif

    </body>
</html>
