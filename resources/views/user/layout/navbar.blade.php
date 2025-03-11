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
                        <a class="nav-link active" aria-current="page"  href="{{ !request()->is('/home') ? '/home#home' : '#home' }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" href="{{ !request()->is('/home') ? '/home#about' : '#about' }}">Tentang Kami</a>
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
                    {{-- <li class="nav-item mt-3 mt-lg-0">
                        <a class="main-btn" href="#rooms">Pesan Sekarang</a>
                    </li> --}}

                </ul>
                <ul class="navbar-nav menu-navbar-nav">

                    {{-- sudah login --}}
                    @if(Auth::check())
                    <li class="nav-item dropdown no-arrow">
                        
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <small class="text-warning font-weight-bold text-uppercase">{{ Auth::user()->name }}</small>
                            {{-- <img width="50px" class="img-profile rounded-circle"
                                src="images/undraw_profile.svg"> --}}
                        </a>
                      
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/logout" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                    @else
                      {{-- belum login --}}
                      <li class="nav-item mt-3 mt-lg-0">
                        <a onmouseover="this.style.color='white'" onmouseout="this.style.color='black'" style="border-color: #caa169; text-transform: capitalize" class="login nav-link main-btn" href="/login">Login</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header> 
<!-- Navbar section exit -->