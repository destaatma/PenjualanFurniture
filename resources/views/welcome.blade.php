@extends('layouts.user.main')
@section('content')
    <style>
        .hero-img-wrap {
            max-width: 100%;
            display: flex;
            justify-content: center;
        }

        .hero-img {
            width: 100%;
            height: auto;
            max-width: 600px;
            /* Sesuaikan ukuran maksimal jika diperlukan */
        }
    </style>
    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Produk Terbaik & <span class="d-block">Bahan Berkualitas</span></h1>
                        <p class="mb-4">Rumah Mebel hadir untuk menghadirkan furnitur berkualitas tinggi dengan desain yang
                            elegan dan fungsional. Kami percaya bahwa setiap ruangan memiliki karakter, dan furnitur yang
                            tepat dapat memberikan sentuhan estetika serta kenyamanan maksimal.</p>
                        <a href="/produk" class="btn btn-secondary me-2">Jelajahi Produk</a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="hero-img-wrap text-center">
                        <img src="{{ url('/beranda/assets/images/couch.png') }}" class="img-fluid hero-img">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <!-- Start Product Section -->
    <div class="product-section border-bottom pb-4 mb-5">
        <div class="container">
            <div class="row">

                <!-- Start Column 1 -->
                <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                    <h2 class="mb-4 section-title">Dibuat dengan bahan berkualitas tinggi</h2>
                    <p class="mb-4">Kami bukan sekadar penyedia furnitur, tetapi mitra dalam menciptakan ruang impian Anda.
                        Temukan inspirasi dan jadikan rumah atau bisnis Anda lebih istimewa dengan Rumah Mebel!. </p>
                    <p><a href="/pemesanan" class="btn">Beli Sekarang</a></p>
                </div>
                <!-- End Column 1 -->

                <!-- Start Column 2 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                    <a class="product-item" href="cart.html">
                        <img src="{{ url('/beranda/assets/images/product-1.png') }}" class="img-fluid product-thumbnail">
                        <h3 class="product-title">kursi jati</h3>
                        <strong class="product-price">$50.00</strong>

                        <span class="icon-cross">
                            <img src="{{ url('/beranda/assets/images/cross.svg') }}" class="img-fluid">
                        </span>
                    </a>
                </div>
                <!-- End Column 2 -->

                <!-- Start Column 3 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                    <a class="product-item" href="cart.html">
                        <img src="{{ url('/beranda/assets/images/product-2.png') }}" class="img-fluid product-thumbnail">
                        <h3 class="product-title">Kursi akasia</h3>
                        <strong class="product-price">$78.00</strong>

                        <span class="icon-cross">
                            <img src="{{ url('/beranda/assets/images/cross.svg') }}" class="img-fluid">
                        </span>
                    </a>
                </div>
                <!-- End Column 3 -->

                <!-- Start Column 4 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                    <a class="product-item" href="cart.html">
                        <img src="{{ url('/beranda/assets/images/product-3.png') }}" class="img-fluid product-thumbnail">
                        <h3 class="product-title">kursi mahoni</h3>
                        <strong class="product-price">$43.00</strong>

                        <span class="icon-cross">
                            <img src="{{ url('/beranda/assets/images/cross.svg') }}" class="img-fluid">
                        </span>
                    </a>
                </div>
                <!-- End Column 4 -->

            </div>
        </div>
    </div>
    <!-- End Product Section -->

    <!-- Start Why Choose Us Section -->
    <div class="why-choose-section border-bottom pb-4 mb-5">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <h2 class="section-title">"Mengapa Memilih Kami"</h2>
                    <p>Dengan bahan pilihan terbaik dan pengerjaan yang teliti, Desta Mebel menawarkan produk yang tahan
                        lama, kuat, dan berkelas. Dari meja, kursi, lemari hingga set ruang tamu, setiap karya kami
                        mencerminkan dedikasi terhadap keindahan dan fungsionalitas.</p>

                    <div class="row my-5">
                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ url('/beranda/assets/images/truck.svg') }}" alt="Image" class="imf-fluid">
                                </div>
                                <h3>Cepat &amp; Aman</h3>
                                <p>Kami memahami bahwa setiap pelanggan ingin menerima pesanan mereka dengan cepat dan tanpa
                                    khawatir. Oleh karena itu, Desta Mebel berkomitmen untuk menyediakan layanan pengiriman
                                    yang efisien, aman, dan terpercaya
                                </p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ url('/beranda/assets/images/bag.svg') }}" alt="Image" class="imf-fluid">
                                </div>
                                <h3>Mudah dalam Pemesanan</h3>
                                <p>Belanja mudah, pengiriman aman, kepuasan terjamin! Mulai belanja sekarang dan jadikan
                                    rumah Anda lebih nyaman dengan Desta Mebel
                                </p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ url('/beranda/assets/images/support.svg') }}" alt="Image"
                                        class="imf-fluid">
                                </div>
                                <h3>24/7 Melayani</h3>
                                <p>Kapan pun Anda membutuhkan kami, tim Desta Mebel selalu siap memberikan layanan terbaik..
                                </p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ url('/beranda/assets/images/return.svg') }}" alt="Image" class="imf-fluid">
                                </div>
                                <h3>Mudah Dalam Pengembalian</h3>
                                <p>Kami memahami bahwa terkadang produk yang diterima tidak sesuai dengan harapan. Jangan
                                    khawatir! Kami menyediakan proses pengembalian barang yang cepat dan mudah.
                                    .</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="img-wrap">
                        <img src="{{ url('/beranda/assets/images/why-choose-us-img.jpg') }}" alt="Image" class="img-fluid">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Why Choose Us Section -->

    <!-- Start Popular Product -->
    <div class="container mt-5 border-bottom pb-4 mb-5" style="max-width: 1100px;">
        <h2 class="text-center fw-bold mb-4">Produk Terlaris di Rumah Mebel</h2>

        <div class="row g-3 justify-content-center"> <!-- g-3 tetap memberikan jarak antar gambar -->

            <!-- Produk 1 -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="text-center p-2">
                    <img src="{{ url('/beranda/assets/images/product-1.png') }}" alt="Almari Penyekat Ruangan"
                        class="img-fluid rounded shadow-sm">
                </div>
            </div>

            <!-- Produk 2 -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="text-center p-2">
                    <img src="{{ url('/beranda/assets/images/product-2.png') }}" alt="Bale-Bale"
                        class="img-fluid rounded shadow-sm">
                </div>
            </div>

            <!-- Produk 3 -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="text-center p-2">
                    <img src="{{ url('/beranda/assets/images/product-3.png') }}" alt="Bangku Taman"
                        class="img-fluid rounded shadow-sm">
                </div>
            </div>

            <!-- Produk 4 -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="text-center p-2">
                    <img src="{{ url('/beranda/assets/images/product-1.png') }}" alt="Buffet"
                        class="img-fluid rounded shadow-sm">
                </div>
            </div>

            <!-- Produk 5 -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="text-center p-2">
                    <img src="{{ url('/beranda/assets/images/product-2.png') }}" alt="Buffet TV"
                        class="img-fluid rounded shadow-sm">
                </div>
            </div>

            <!-- Produk 6 -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="text-center p-2">
                    <img src="{{ url('/beranda/assets/images/product-3.png') }}" alt="Custom Design Furniture"
                        class="img-fluid rounded shadow-sm">
                </div>
            </div>

            <!-- Produk 7 -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="text-center p-2">
                    <img src="{{ url('/beranda/assets/images/product-1.png') }}" alt="Display Cabinet"
                        class="img-fluid rounded shadow-sm">
                </div>
            </div>

            <!-- Produk 8 -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="text-center p-2">
                    <img src="{{ url('/beranda/assets/images/product-2.png') }}" alt="Furniture Dapur"
                        class="img-fluid rounded shadow-sm">
                </div>
            </div>
        </div>
    </div>
    <!-- End Popular Product -->

    <!-- Start Testimonial Slider -->
    <div class="testimonial-section border-bottom pb-4 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto text-center">
                    <h2 class="section-title">Ulasan</h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="testimonial-slider-wrap text-center">

                        <div id="testimonial-nav">
                            <span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
                            <span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
                        </div>

                        <div class="testimonial-slider">

                            <div class="item">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 mx-auto">

                                        <div class="testimonial-block text-center">
                                            <blockquote class="mb-5">
                                                <p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae
                                                    odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                                                    vulputate velit imperdiet dolor tempor tristique. Pellentesque
                                                    habitant morbi tristique senectus et netus et malesuada fames ac
                                                    turpis egestas. Integer convallis volutpat dui quis
                                                    scelerisque.&rdquo;</p>
                                            </blockquote>

                                            <div class="author-info">
                                                <div class="author-pic">
                                                    <img src="{{ url('/beranda/assets/images/person-1.png') }}"
                                                        alt="Maria Jones" class="img-fluid">
                                                </div>
                                                <h3 class="font-weight-bold">Maria Jones</h3>
                                                <span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- END item -->

                            <div class="item">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 mx-auto">

                                        <div class="testimonial-block text-center">
                                            <blockquote class="mb-5">
                                                <p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae
                                                    odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                                                    vulputate velit imperdiet dolor tempor tristique. Pellentesque
                                                    habitant morbi tristique senectus et netus et malesuada fames ac
                                                    turpis egestas. Integer convallis volutpat dui quis
                                                    scelerisque.&rdquo;</p>
                                            </blockquote>

                                            <div class="author-info">
                                                <div class="author-pic">
                                                    <img src="{{ url('/beranda/assets/images/person-1.png') }}"
                                                        alt="Maria Jones" class="img-fluid">
                                                </div>
                                                <h3 class="font-weight-bold">Maria Jones</h3>
                                                <span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- END item -->

                            <div class="item">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 mx-auto">

                                        <div class="testimonial-block text-center">
                                            <blockquote class="mb-5">
                                                <p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae
                                                    odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                                                    vulputate velit imperdiet dolor tempor tristique. Pellentesque
                                                    habitant morbi tristique senectus et netus et malesuada fames ac
                                                    turpis egestas. Integer convallis volutpat dui quis
                                                    scelerisque.&rdquo;</p>
                                            </blockquote>

                                            <div class="author-info">
                                                <div class="author-pic">
                                                    <img src="{{ url('/beranda/assets/images/person-1.png') }}"
                                                        alt="Maria Jones" class="img-fluid">
                                                </div>
                                                <h3 class="font-weight-bold">Maria Jones</h3>
                                                <span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- END item -->

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonial Slider -->
@endsection
