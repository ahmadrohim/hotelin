<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="background-color: #7D0A0A">
    <div class="container">
        {{-- <a class="navbar-brand" href="#page-top"><img src="assets/img/navbar-logo.svg" alt="..." /></a> --}}
        <a class="navbar-brand" href="#page-top">Hotelin</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
           Menu 
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0 font-weight-bold" >
                <li class="nav-item"><a class="nav-link" href="/#page-top">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="/#rooms">Kamar</a></li>
                <li class="nav-item"><a class="nav-link" href="/#nearby-attractions">Sekitar Hotel</a></li>
                <li class="nav-item"><a class="nav-link" href="/#contact">Kontak</a></li>
                <li class="nav-item">
                    @guest
                        <a class="btn btn-warning text-uppercase px-3" href="/login">Login</a>
                    @else
                        <div class="dropdown">
                            <button class="btn btn-warning text-uppercase px-3 dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                <li>
                                    <a class="dropdown-item text-capitalize" href="/booking/{{ Auth::user()->id }}">Pesanan Saya</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-capitalize" href="">Profil</a>
                                </li>
                                <li>
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endguest
                </li>                
            </ul>
        </div>
    </div>
</nav>