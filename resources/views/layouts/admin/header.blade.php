<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3">RUMAH Mebel</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" id="navbarDropdown" href="#"
                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw fs-5"></i>
                <span class="text-white">{{ Auth::user()->email ?? 'Akun' }}</span>
            </a>

            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="/profil">Profile</a></li>
                <li><a class="dropdown-item" href="/">Beranda</a></li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item btn-success text-dark">Keluar</button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
