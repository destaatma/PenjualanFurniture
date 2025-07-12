<!-- Sidebar HTML -->
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <!-- Dashboard -->
                <a class="nav-link {{ request()->is('admin') || request()->is('dashboard') ? 'active' : '' }}"
                    href="/admin">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-tachometer-alt" style="color: #ffc107;"></i>
                    </div>
                    Dashboard
                </a>

                <!-- Manajemen Produk (Dropdown) -->
                <a class="nav-link {{ request()->is('admin/kategori*') || request()->is('admin/produk*') ? '' : 'collapsed' }}"
                    href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                    aria-expanded="{{ request()->is('admin/kategori*') || request()->is('admin/produk*') ? 'true' : 'false' }}"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-columns" style="color: #007bff;"></i>
                    </div>
                    Manajemen Produk
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse {{ request()->is('admin/kategori*') || request()->is('admin/produk*') ? 'show' : '' }}"
                    id="collapseLayouts" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ request()->is('admin/kategori') ? 'active' : '' }}"
                            href="/admin/kategori">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-list" style="color: #28a745;"></i>
                            </div>
                            Kategori
                        </a>
                        <a class="nav-link {{ request()->is('admin/produk') ? 'active' : '' }}" href="/admin/produk">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-box-open" style="color: #dc3545;"></i>
                            </div>
                            Produk
                        </a>
                    </nav>
                </div>


                <!-- Transaksi (Dropdown) -->
                <a class="nav-link {{ request()->is('admin/pemesanan*') || request()->is('admin/pembayaran*') || request()->is('admin/pengiriman*') ? '' : 'collapsed' }}"
                    href="#" data-bs-toggle="collapse" data-bs-target="#collapseTransaksi"
                    aria-expanded="{{ request()->is('admin/pemesanan*') || request()->is('admin/pembayaran*') || request()->is('admin/pengiriman*') ? 'true' : 'false' }}"
                    aria-controls="collapseTransaksi">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-book-open" style="color: #17a2b8;"></i>
                    </div>
                    Transaksi
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ request()->is('admin/pemesanan*') || request()->is('admin/pembayaran*') || request()->is('admin/pengiriman*') ? 'show' : '' }}"
                    id="collapseTransaksi" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ request()->is('admin/pemesanan') ? 'active' : '' }}"
                            href="/admin/pemesanan">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-shopping-cart" style="color: #ff5733;"></i>
                            </div>
                            Pemesanan
                        </a>
                        <a class="nav-link {{ request()->is('admin/pembayaran') ? 'active' : '' }}"
                            href="/admin/pembayaran">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-credit-card" style="color: #6f42c1;"></i>
                            </div>
                            Pembayaran
                        </a>
                        <a class="nav-link {{ request()->is('admin/pengiriman') ? 'active' : '' }}"
                            href="/admin/pengiriman">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-truck" style="color: #fd7e14;"></i>
                            </div>
                            Pengiriman
                        </a>
                    </nav>
                </div>


                <!-- Ulasan -->
                <a class="nav-link {{ request()->is('admin/ulasan') ? 'active' : '' }}" href="/admin/ulasan">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-chart-area" style="color: #20c997;"></i>
                    </div>
                    Ulasan
                </a>

                <!-- Pengguna -->
                <a class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}" href="/admin/users">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-user" style="color: #e83e8c;"></i>
                    </div>
                    Pengguna
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <span>Omah Mebel</span>
        </div>
    </nav>
</div>
<!-- Sidebar CSS -->
<style>
    .sb-sidenav .nav-link {
        margin-bottom: 8px;
        font-size: 16px;
        padding: 12px 20px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .sb-sidenav .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
        color: #0d6efd !important;
        border-radius: 8px;
    }

    .sb-sidenav .nav-link.active {
        color: white !important;
        font-weight: bold;
        background-color: #343a40;
        border-radius: 8px;
    }

    .sb-sidenav .sb-nav-link-icon {
        margin-right: 10px;
    }

    .sb-sidenav-menu {
        padding: 10px;
    }

    .sb-sidenav-footer {
        padding: 20px;
        font-size: 15px;
        background-color: #212529;
        color: #adb5bd;
    }
</style>
