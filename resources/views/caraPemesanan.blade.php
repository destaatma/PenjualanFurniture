@extends('layouts.user.main')

@section('content')
    <div class="caraPemesanan py-3">
        <div class="container">
            <!-- Heading -->
            <div class="row text-center">
                <div class="col-12">
                    {{-- Breadcrumb navigation to improve user experience --}}
                    <h1 class="mb-4 mt-4 fw-bold text-uppercase">
                        Cara Pemesanan
                    </h1>
                    <p class="mb-4 text-secondary fs-5">
                        RUMAH Mebel – Ikuti langkah-langkah berikut untuk melakukan pemesanan produk:
                    </p>
                </div>
            </div>

            <!-- Card Content -->
            <div class="row">
                <div class="col-lg-12 mx-auto mb-4">
                    <div class="shadow-sm p-4 text-black" style="border-radius: 10px;">
                        <ul class="ps-3">
                            <li class="mb-3">
                                <strong>Temukan produk mebel pilihan Anda</strong> di katalog online kami!
                                <strong>RUMAHMebel.com</strong> menyediakan berbagai jenis furnitur berkualitas sesuai
                                kebutuhan
                                rumah Anda.
                            </li>

                            <li class="mb-3">
                                ✅ <strong>Cara Memesan:</strong>
                                <ul class="mt-2">
                                    <li><strong>Langsung Checkout di Website</strong><br>
                                        Pilih kategori, produk, dan jumlah barang, lalu lanjutkan ke proses checkout melalui
                                        sistem kami. Anda dapat melakukan pembayaran secara langsung dan aman melalui metode
                                        pembayaran yang tersedia di website.
                                    </li>
                                    <li class="mt-2"><strong>Hubungi Kami via WhatsApp/Telepon</strong><br>
                                        Jika Anda ingin konsultasi terlebih dahulu atau memesan secara manual, hubungi kami
                                        melalui:<br>
                                        📱 WhatsApp/Telepon: <strong>0878 6035 2236 (a.n. Desta)</strong><br>
                                        Kami akan menginformasikan prosedur order, total harga, dan estimasi biaya kirim.
                                    </li>
                                </ul>
                            </li>

                            <li class="mb-3">
                                💳 <strong>Ketentuan Pembayaran:</strong>
                                <ul class="mt-2">
                                    <li>Jika produk <strong>ready stok</strong>, Anda dapat langsung melakukan pembayaran
                                        penuh.
                                    </li>
                                    <li>Jika produk <strong>pre-order (tidak ready stok)</strong>, Anda perlu melakukan
                                        <strong>DP sebesar 50%</strong> dari total harga.
                                    </li>
                                    <li><strong>Pelunasan (50%)</strong> dilakukan setelah produk siap kirim.</li>
                                </ul>
                            </li>

                            <li class="mb-3">
                                🛠️ <strong>Proses Produksi:</strong>
                                <ul class="mt-2">
                                    <li>Waktu produksi: <strong>7–15 hari kerja</strong>, tergantung jenis produk.</li>
                                    <li>Kami akan mengirim <strong>foto update proses produksi atau finishing</strong>
                                        melalui
                                        WhatsApp Anda.</li>
                                    <li><strong>Pembatalan</strong> hanya berlaku sebelum proses produksi dimulai, dan
                                        <strong>DP akan dikembalikan 100%</strong>.
                                    </li>
                                </ul>
                            </li>

                            <li class="mb-3">
                                🚚 <strong>Pengiriman:</strong>
                                <ul class="mt-2">
                                    <li>Menggunakan <strong>jasa ekspedisi lokal/kargo</strong> agar biaya lebih hemat.</li>
                                    <li><strong>Biaya kirim ditanggung pembeli.</strong></li>
                                </ul>
                            </li>

                            <li class="mb-3">
                                📦 <strong>Jika Barang Diterima Rusak:</strong>
                                <ul class="mt-2">
                                    <li>Klaim hanya bisa dilakukan <strong>saat kurir masih berada di lokasi
                                            penerimaan</strong>.</li>
                                    <li>Jika <strong>lecet ringan</strong>, kami akan kirimkan bahan finishing untuk
                                        perbaikan.
                                    </li>
                                    <li>Jika <strong>rusak berat</strong>, kami akan mengganti barang baru setelah barang
                                        rusak
                                        dikembalikan (retur).</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
@endsection