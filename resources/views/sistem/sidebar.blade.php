<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <i class="fa fa-home"></i>
        <span class="brand-text font-weight-light">SDN 003 Sangatta Utara</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            @auth
                <div class="info">
                    <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                </div>
            @endauth
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('app') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('search') }}" class="nav-link {{ request()->is('search') ? 'active' : '' }}"
                        id="data-filter">
                        {{-- <i class="nav-icon fa fa-exchange"></i> --}}
                        <i class="nav-icon fa-solid fa-magnifying-glass"></i>
                        <p>
                            Pencarian
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('bukus', 'anggotas') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('bukus', 'anggotas') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Data
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('bukus.index') }}"
                                class="nav-link {{ request()->is('bukus') ? 'active' : '' }}" id="data-filter">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Data Buku</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('anggotas.index') }}"
                                class="nav-link {{ request()->is('anggotas') ? 'active' : '' }}" id="data-filter">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Data Anggota</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('peminjaman', 'pengembalian') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->is('peminjaman', 'pengembalian') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Transaksi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('peminjaman') }}"
                                class="nav-link {{ request()->is('peminjaman') ? 'active' : '' }}" id="data-filter">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Peminjaman</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pengembalian') }}"
                                class="nav-link {{ request()->is('pengembalian') ? 'active' : '' }}" id="data-filter">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Pengembalian</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('laporan') }}" class="nav-link {{ request()->is('laporan') ? 'active' : '' }}">
                        <i class="fa-solid fa-line-chart"></i>
                        <p>
                            Laporan
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
