<!-- Start Header/Navigation -->
<nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" aria-label="Furni navigation bar">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="/">RUMAH Mebel</a>

        <!-- Toggle button (mobile) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
            aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse show" id="navbarsFurni">
            <!-- Left: Menu -->
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('tentangKami') ? 'active' : '' }}" href="/tentangKami">Tentang
                        Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('produk') ? 'active' : '' }}" href="/produk">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('caraPemesanan') ? 'active' : '' }}" href="/caraPemesanan">Cara
                        Pemesanan</a>
                </li>

                <!-- Auth Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" href="/login">Masuk/Buat Akun</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="#" class="nav-link"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Keluar
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>

            <!-- Right: Cart & Notification -->
            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-4 d-flex align-items-center gap-3">
                <li>
                    <a class="nav-link" href="/keranjang" title="Keranjang Belanja">
                        <img src="{{ url('/beranda/assets/images/cart.svg') }}" alt="Cart">
                    </a>
                </li>
                <li>
                    <a class="nav-link position-relative" href="/notifikasi" title="Notifikasi">
                        <i class="bi bi-bell fs-4"></i>
                        <!-- Optional: Notification Badge -->
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            3
                            <span class="visually-hidden">notifikasi baru</span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Header/Navigation -->