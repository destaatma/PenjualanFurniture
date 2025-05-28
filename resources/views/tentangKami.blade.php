@extends('layouts.user.main')

@section('content')
    <!-- Start Hero Section -->
    <div class="hero py-5">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <!-- Teks Tentang Kami -->
                <div class="col-lg-7">
                    <div class="hero-text-wrap">
                        <h2 class="fw-bold text-white">Tentang Kami - RUMAH Mebel</h2>
                        <div class="about-text px-2 py-3">
                            <p class="fs-5 text-light mb-4">
                                <strong>RUMAH Mebel</strong> hadir sebagai solusi bagi Anda yang menginginkan furnitur
                                berkualitas tinggi dengan desain elegan dan fungsional. Kami percaya bahwa setiap ruangan
                                memiliki karakter unik, dan furnitur yang tepat dapat memberikan sentuhan estetika serta
                                kenyamanan maksimal.
                            </p>
                            <p class="fs-5 text-light mb-4">
                                Dengan pengalaman dalam industri mebel, kami berkomitmen menghadirkan produk yang dibuat
                                dari bahan pilihan dan melalui proses produksi yang teliti. <em>Setiap produk dirancang
                                    dengan keseimbangan antara keindahan, daya tahan, dan fungsionalitas</em>, memastikan
                                bahwa setiap pembelian memberikan nilai terbaik bagi pelanggan.
                            </p>
                            <p class="fs-5 text-light mb-4">
                                Kami juga memahami bahwa setiap individu memiliki preferensi dan kebutuhan berbeda. Oleh
                                karena itu, RUMAH Mebel menawarkan berbagai pilihan desain, warna, dan ukuran yang dapat
                                disesuaikan dengan selera dan ruang Anda. Dari furnitur klasik hingga modern, semua produk
                                kami dirancang untuk menghadirkan harmoni dalam setiap sudut rumah atau bisnis Anda.
                            </p>
                            <p class="fs-5 text-light mb-0">
                                Sebagai bagian dari komitmen kami terhadap <strong>kepuasan pelanggan</strong>, RUMAH Mebel
                                senantiasa mengutamakan layanan yang ramah dan profesional. Kami siap membantu Anda
                                menemukan furnitur terbaik yang sesuai dengan kebutuhan, serta memberikan dukungan penuh
                                dalam setiap proses pembelian.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Gambar -->
                <div class="col-lg-5">
                    <div class="hero-img-wrap text-center">
                        <img src="{{ url('/beranda/assets/images/ruangan-1.jpg') }}" alt="Tentang Kami - RUMAH Mebel"
                            class="rounded shadow-lg img-fluid" style="max-width: 80%; height: auto; margin-top: -200px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->
@endsection
