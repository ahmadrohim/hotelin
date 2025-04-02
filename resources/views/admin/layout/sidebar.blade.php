<ul style="background-color: #7D0A0A" class="navbar-nav sidebar sidebar-dark accordion shadow" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-heading"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Hotelin</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

        <!-- Dashboard -->
        <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="/dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
    
        <!-- Heading: Manajemen -->
        <div class="sidebar-heading">Manajemen</div>
    
        <!-- Manajemen Kamar -->
        <li class="nav-item {{ Request::is('ourRoom*') || Request::is('categoryRoom*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKamar"
                aria-expanded="true" aria-controls="collapseKamar">
                <i class="fas fa-fw fa-bed"></i>
                <span>Manajemen Kamar</span>
            </a>
            <div id="collapseKamar" class="collapse" aria-labelledby="headingKamar" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Kelola Kamar:</h6>
                    <a class="collapse-item" href="/ourRoom">Daftar Kamar</a>
                    <a class="collapse-item" href="/categoryRoom">Kategori Kamar</a>
                </div>
            </div>
        </li>
    
        <!-- Manajemen Pemesanan -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePemesanan"
                aria-expanded="true" aria-controls="collapsePemesanan">
                <i class="fas fa-fw fa-calendar-check"></i>
                <span>Manajemen Pemesanan</span>
            </a>
            <div id="collapsePemesanan" class="collapse" aria-labelledby="headingPemesanan" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Kelola Pemesanan:</h6>
                    <a class="collapse-item" href="/admin/pemesanan">Semua Pemesanan</a>
                    <a class="collapse-item" href="/admin/pemesanan/aktif">Pemesanan Aktif</a>
                    <a class="collapse-item" href="/admin/pemesanan/selesai">Pemesanan Selesai</a>
                </div>
            </div>
        </li>

         <!-- Manajemen Pengguna -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
                aria-expanded="true" aria-controls="collapseUsers">
                <i class="fas fa-users"></i>
                <span>Manajemen Pengguna</span>
            </a>
            <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Kelola Pengguna:</h6>
                    <a class="collapse-item" href="admin.html">Admin</a>
                    <a class="collapse-item" href="users.html">Tamu/Pelanggan</a>
                </div>
            </div>
        </li>
    
        <!-- Heading: Fasilitas -->
        <div class="sidebar-heading">Fasilitas</div>

          <!-- Fasilitas-->
          <li class="nav-item">
            <a class="nav-link" href="/admin/dashboard">
                <i class="fas fa-fw fa-concierge-bell"></i>
                <span>Fasilitas Hotel</span>
            </a>
        </li>


        <!-- Heading: Informasi Sekitar -->
        <div class="sidebar-heading">Informasi Sekitar</div>

        <!-- Sekitar Hotel -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSekitar"
                aria-expanded="true" aria-controls="collapseSekitar">
                <i class="fas fa-fw fa-map-marker-alt"></i>
                <span>Sekitar Hotel</span>
            </a>
            <div id="collapseSekitar" class="collapse" aria-labelledby="headingSekitar" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Wisata Terdekat:</h6>
                    <a class="collapse-item" href="/admin/sekitar-hotel">Daftar Wisata</a>
                    <a class="collapse-item" href="/admin/sekitar-hotel/kategori">Kategori Wisata</a>
                </div>
            </div>
        </li>

    
        <!-- Heading: Laporan & Pengaturan -->
        <div class="sidebar-heading">Laporan & Pengaturan</div>
    
        <!-- Laporan -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan"
                aria-expanded="true" aria-controls="collapseLaporan">
                <i class="fas fa-fw fa-chart-line"></i>
                <span>Laporan</span>
            </a>
            <div id="collapseLaporan" class="collapse" aria-labelledby="headingLaporan" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Laporan:</h6>
                    <a class="collapse-item" href="/admin/laporan/pendapatan">Laporan Pendapatan</a>
                    <a class="collapse-item" href="/admin/laporan/pemesanan">Laporan Pemesanan</a>
                </div>
            </div>
        </li>
    
        <!-- Pengaturan -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePengaturan"
                aria-expanded="true" aria-controls="collapsePengaturan">
                <i class="fas fa-fw fa-cogs"></i>
                <span>Pengaturan</span>
            </a>
            <div id="collapsePengaturan" class="collapse" aria-labelledby="headingPengaturan" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Pengaturan Umum:</h6>
                    <a class="collapse-item" href="/admin/pengaturan/profil">Profil Hotel</a>
                    <a class="collapse-item" href="/admin/pengaturan/sosial-media">Sosial Media</a>
                    <a class="collapse-item" href="/admin/pengaturan/umum">Pengaturan Umum</a>
                    <a class="collapse-item" href="/admin/pengaturan/galeri">Galeri Hotel</a>
                    <a class="collapse-item" href="/admin/pengaturan/email">Email & Notifikasi</a>
                    <a class="collapse-item" href="/admin/pengaturan/pembayaran">Metode Pembayaran</a>
                </div>
            </div>
        </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>