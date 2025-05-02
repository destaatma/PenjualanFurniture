<style>
    .active {
        color: white;
        font-weight: bold;
    }
</style>

<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link {{ request()->is('admin') || request()->is('dashboard') ? 'active' : '' }}"
                    href="/admin">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt" style="color: #ffc107;"></i></div>
                    Dashboard
                </a>
                <a class="nav-link {{ request()->is('manajemen-produk*') ? 'active' : '' }}
     href=" # data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns" style="color: #007bff;"></i></div>
                    Manajemen Produk
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ request()->is('/admin/kategori') ? 'active' : '' }}" href="/admin/kategori">
                            <div class="sb-nav-link-icon"><i class="fas fa-list" style="color: #28a745;"></i></div>
                            Kategori
                        </a>
                        <a class="nav-link {{ request()->is('/admin/produk') ? 'active' : '' }}" href="/admin/produk">
                            <div class="sb-nav-link-icon"><i class="fas fa-box-open" style="color: #dc3545;"></i></div>
                            Produk
                        </a>
                    </nav>
                </div>

                <!-- Transaksi -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                    aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open" style="color: #17a2b8;"></i></div>
                    Transaksi
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse " id="collapsePages" aria-labelledby="headingTwo"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                        <!-- Pemesanan -->
                        <a class="nav-link {{ request()->is('admin/pemesanan') ? 'active' : '' }}" href="/admin/pemesanan">
                            <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart" style="color: #ff5733;"></i>
                            </div>
                            Pemesanan
                        </a>

                        <!-- Pembayaran -->
                        <a class="nav-link {{ request()->is('admin/pembayaran') ? 'active' : '' }}" href="/admin/pembayaran">
                            <div class="sb-nav-link-icon"><i class="fas fa-credit-card" style="color: #6f42c1;"></i>
                            </div>
                            Pembayaran
                        </a>

                        <!-- Pengiriman -->
                        <a class="nav-link {{ request()->is('admin/pengiriman') ? 'active' : '' }}" href="/admin/pengiriman">
                            <div class="sb-nav-link-icon"><i class="fas fa-truck" style="color: #fd7e14;"></i></div>
                            Pengiriman
                        </a>
                    </nav>
                </div>

                <a class="nav-link {{ request()->is('admin/ulasan') ? 'active' : '' }}" href="/admin/ulasan">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area" style="color: #20c997;"></i></div>
                    Ulasan
                </a>
                <a class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}" href="/admin/users">
                    <div class="sb-nav-link-icon"><i class="fas fa-user" style="color: #e83e8c;"></i></div>
                    Pengguna
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <span>Rumah Mebel</span>
        </div>
    </nav>
</div>
