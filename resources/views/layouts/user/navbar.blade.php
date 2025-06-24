<!-- Start Header/Navigation -->
<nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" aria-label="Furni navigation bar">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="/">OMAH Mebel</a>

        <!-- Toggle button (mobile) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
            aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <!-- Menu Utama -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('produk*') ? 'active' : '' }}" href="/produk">Katalog Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('tentangKami*') ? 'active' : '' }}" href="/tentangKami">Tentang
                        Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('caraPemesanan*') ? 'active' : '' }}" href="/caraPemesanan">Cara
                        Pemesanan</a>
                </li>

                <!-- Auth Links -->
                {{-- @guest
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('login') ? 'active' : '' }}" href="#"
                        id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Akun
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/login">Masuk</a></li>
                        <li><a class="dropdown-item" href="/register">Buat Akun</a></li>
                    </ul>
                </li>
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->nama ?? Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Profil Saya</a></li>
                        <li><a class="dropdown-item" href="/pesanan.riwayat">Riwayat Pesanan</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item btn-success text-dark">Keluar</button>
                            </form>
                        </li>
                    </ul>
                </li>
                @endguest --}}

                {{-- auth link baru --}}
                <!-- Auth Links -->
                @guest
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('login') ? 'active' : '' }}" href="#"
                            id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user me-1"></i> Akun
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('login') }}"><i
                                        class="fas fa-sign-in-alt me-2"></i>Masuk</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}"><i
                                        class="fas fa-user-plus me-2"></i>Buat Akun</a></li>
                        </ul>
                    </li>
                @else
                    {{-- Jika pengguna sudah login, tampilkan dropdown menu ini --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->nama ?? Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="navbarDropdown">

                            {{-- Cek peran pengguna. Tampilkan menu yang sesuai. --}}
                            @if (Auth::user()->role == 'admin')

                                {{-- =================== --}}
                                {{-- Menu Khusus ADMIN --}}
                                {{-- =================== --}}
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.beranda.index') }}">
                                        <i class="fas fa-cogs me-2"></i>Dashboard Admin
                                    </a>
                                </li>
                            @else

                                {{-- ====================== --}}
                                {{-- Menu Khusus PELANGGAN --}}
                                {{-- ====================== --}}
                                <li>
                                    <a class="dropdown-item" href="/profil">
                                        <i class="fas fa-user me-2"></i>Profil Saya
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('pesanan.riwayat') }}">
                                        <i class="fas fa-box me-2"></i>Riwayat Pesanan
                                    </a>
                                </li>

                            @endif

                            {{-- ================================================ --}}
                            {{-- Menu yang selalu tampil untuk semua peran (yang sudah login) --}}
                            {{-- ================================================ --}}
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fas fa-sign-out-alt me-2"></i>Keluar
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
                <!-- Cart & Notification -->
                <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-4 d-flex align-items-center gap-3">
                    <!-- Keranjang -->
                    <li>
                        <a class="nav-link" href="/keranjang" title="Keranjang Belanja">
                            <img src="{{ url('/beranda/assets/images/cart.svg') }}" alt="Cart">
                        </a>
                    </li>
                </ul>
        </div>
    </div>
</nav>
<!-- End Header/Navigation -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
<!-- Navbar Style -->
<style>
    .nav-link {
        color: rgba(255, 255, 255, 0.6);
        position: relative;
        padding-bottom: 5px;
        transition: all 0.3s;
        font-weight: normal;
    }

    .nav-link.active {
        color: white;
        font-weight: bold;
    }

    .nav-link.active::after {
        content: '';
        position: absolute;
        width: 50px;
        height: 5px;
        background-color: #f4c542;
        left: 50%;
        transform: translateX(-50%);
        bottom: 0;
        border-radius: 2px;
    }
</style>