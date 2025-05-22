<!-- Start Header/Navigation -->
<nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark " arial-label="Furni navigation bar">
    <div class="container">
        <a class="navbar-brand" href="/">RUMAH Mebel</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
            aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse show" id="navbarsFurni" style="">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li><a class="nav-link" href="/tentangKami">Tentang Kami</a></li>
                <li><a class="nav-link" href="/produk">Produk</a></li>
                <li><a class="nav-link" href="/caraPemesanan">Cara Pemesanan</a></li>
                <li><a class="nav-link" href="/login">Masuk/Buat Akun</a></li>
                @auth
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link border-0 bg-transparent w-100">Keluar</button>
                        </form>
                    </li>
                @endauth
            </ul>
            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                <li><a class="nav-link" href="/keranjang"><img src="{{ url('/beranda/assets/images/cart.svg') }}"></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Header/Navigation -->