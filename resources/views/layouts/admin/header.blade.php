<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3">Omah Mebel</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
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

            <!-- Dropdown Menu yang Sudah Diperbaiki -->
            {{-- Pastikan Font Awesome sudah dimuat di layout utama Anda untuk menampilkan ikon --}}
            <ul class="dropdown-menu dropdown-menu-end shadow border-0 p-2" aria-labelledby="navbarDropdown">
                <li>
                    <div class="d-flex flex-column px-3 py-2">
                        {{-- Menampilkan nama pengguna yang sedang login --}}
                        <span class="fw-bold">{{ Auth::user()->nama ?? 'Pengguna' }}</span>
                    </div>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    {{-- Menambahkan ikon, perataan, dan jarak --}}
                    <a class="dropdown-item rounded d-flex align-items-center gap-2" href="/profil">
                        <i class="fas fa-user-circle fa-fw"></i>
                        Profile
                    </a>
                </li>
                <li>
                    <a class="dropdown-item rounded d-flex align-items-center gap-2" href="/">
                        <i class="fas fa-home fa-fw"></i>
                        Beranda
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    {{-- Tombol logout dibuat agar terlihat seperti item menu biasa --}}
                    <form action="{{ route('logout') }}" method="POST" class="w-100">
                        @csrf
                        <button type="submit" class="dropdown-item rounded d-flex align-items-center gap-2 text-danger">
                            <i class="fas fa-sign-out-alt fa-fw"></i>
                            Keluar
                        </button>
                    </form>
                </li>
            </ul>

        </li>
    </ul>
</nav>
