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
                <span>Kelola Kamar</span>
            </a>
            <div id="collapseKamar" class="collapse" aria-labelledby="headingKamar" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/ourRoom">Daftar Kamar</a>
                    <a class="collapse-item" href="/categoryRoom">Kategori Kamar</a>
                </div>
            </div>
        </li>
    
        <!-- Manajemen Pemesanan -->
        <li class="nav-item {{ Request::is('reservation*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePemesanan"
                aria-expanded="true" aria-controls="collapsePemesanan">
                <i class="fas fa-fw fa-calendar-check"></i>
                <span>Kelola Pemesanan</span>
            </a>
            <div id="collapsePemesanan" class="collapse" aria-labelledby="headingPemesanan" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/reservation">Semua Pemesanan</a>
                    <a class="collapse-item" href="/reservation/pending">Pemesanan Pending</a>
                    <a class="collapse-item" href="/reservation/active">Pemesanan Aktif</a>
                    <a class="collapse-item" href="/reservation/completed">Pemesanan Selesai</a>
                    <a class="collapse-item" href="/reservation/canceled">Pemesanan Dibatalkan</a>
                    <a class="collapse-item" href="/reservation/archived">Arsip Pemesanan</a>
                </div>
            </div>
        </li>

         <!-- Manajemen Pengguna -->
        <li class="nav-item {{Request::is('users*') ? 'active' : ''}}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
                aria-expanded="true" aria-controls="collapseUsers">
                <i class="fas fa-users"></i>
                <span>Kelola Pengguna</span>
            </a>
            <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/users">Semua Pengguna</a>
                    <a class="collapse-item" href="/users/admin">Admin</a>
                    <a class="collapse-item" href="/users/staf">Staf</a>
                    <a class="collapse-item" href="/users/customer">Tamu/Pelanggan</a>
                    <a class="collapse-item" href="/users/archived">Arsip Pengguna</a>
                </div>
            </div>
        </li>
    
        <!-- Heading: Fasilitas -->
        <div class="sidebar-heading">Fasilitas</div>

          <!-- Fasilitas-->
          <li class="nav-item {{ Request::is('facilities*') ? 'active' : '' }}">
            <a class="nav-link" href="/facilities">
                <i class="fas fa-fw fa-concierge-bell"></i>
                <span>Fasilitas Hotel</span>
            </a>
        </li>


        <!-- Heading: Informasi Sekitar -->
        <div class="sidebar-heading">Informasi Sekitar</div>

        <!-- Sekitar Hotel -->
        <li class="nav-item {{ Request::is('attraction*') || Request::is('categoryAttraction*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSekitar"
                aria-expanded="true" aria-controls="collapseSekitar">
                <i class="fas fa-fw fa-map-marker-alt"></i>
                <span>Sekitar Hotel</span>
            </a>
            <div id="collapseSekitar" class="collapse" aria-labelledby="headingSekitar" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/attraction">Daftar Wisata</a>
                    <a class="collapse-item" href="/categoryAttraction">Kategori Wisata</a>
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