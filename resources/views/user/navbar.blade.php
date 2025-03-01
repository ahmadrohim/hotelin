<!-- Navbar section -->
<header class="header_wrapper">
    <nav class="navbar navbar-expand-lg bg-white">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img decoding="async" src="/images/logo.png" class="img-fluid" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-stream navbar-toggler-icon"></i>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav menu-navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"  href="{{ !request()->is('/home/...') ? '/home#home' : '#home' }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ !request()->is('/home') ? '/home#about' : '#about' }}">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#rooms">Kamar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ !request()->is('/home') ? '/home#services' : '#services' }}">Fasilitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ !request()->is('/home') ? '/home#contact' : '#contact'}}">Kontak</a>
                    </li>
                    <li class="nav-item mt-3 mt-lg-0">
                        <a class="main-btn" href="#">Pesan Sekarang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- Navbar section exit -->