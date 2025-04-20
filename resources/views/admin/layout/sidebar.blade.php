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
    

        
        <li class="nav-item {{ Request::is('rooms*') ? 'active' : '' }}">
            <a class="nav-link" href="/rooms">
                <i class="fas fa-fw fa-bed"></i>
                <span>Daftar Kamar</span>
            </a>
        </li>

         <li class="nav-item {{ Request::is('facilities*') ? 'active' : '' }}">
           <a class="nav-link" href="/facilities">
                <i class="fas fa-fw fa-swimming-pool"></i>
               <span>Fasilitas Hotel</span>
           </a>
       </li>

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

        
        <li class="nav-item {{ Request::is('facilities*') ? 'active' : '' }}">
            <a class="nav-link" href="/facilities">
                <i class="fas fa-fw fa-comments"></i>
                <span>Ulasan Tamu</span>
            </a>
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
    
       
    
        <!-- Heading: Laporan & Pengaturan -->
        <div class="sidebar-heading">Pengaturan</div>
    
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
                </div>
            </div>
        </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>