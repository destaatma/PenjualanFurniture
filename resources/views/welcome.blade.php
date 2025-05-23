@extends('layouts.user.main')
@section('content')

    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Produk Terbaik & <span class="d-block">Bahan Berkualitas</span></h1>
                        <p class="mb-4">Rumah Mebel hadir untuk menghadirkan furnitur berkualitas tinggi dengan desain yang
                            elegan dan fungsional. Kami percaya bahwa setiap ruangan memiliki karakter, dan furnitur yang
                            tepat dapat memberikan sentuhan estetika serta kenyamanan maksimal.</p>
                        <a href="/produk" class="btn btn-dark me-2">Jelajahi Produk</a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="hero-img-wrap">
                        <img src="{{ url('/beranda/assets/images/couch.png') }}" class="img-fluid w-60 hero-img">
                    </div>
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
                    <p><a href="/produk" class="btn btn-secondary me-2">Beli Sekarang</a></p>
                </div>
                <!-- End Column 1 -->

                <!-- Start Column 2 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                    <a class="product-item" href="produk">
                        <img src="{{ url('/beranda/assets/images/almari.png') }}" class="img-fluid product-thumbnail"
                            style="width: 250px;">
                        <h3 class="product-title text-capitalize fw-bold "
                            style="font-size: 1.1rem; letter-spacing: 0.5px;">
                            Almari Jati
                        </h3>
                    </a>
                </div>
                <!-- End Column 2 -->

                <!-- Start Column 3 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                    <a class="product-item" href="produk">
                        <img src="{{ url('/beranda/assets/images/meja-8.png') }}" class="img-fluid product-thumbnail"
                            style="width: 250px; height: auto;">
                        <h3 class="product-title text-capitalize fw-bold "
                            style="font-size: 1.1rem; letter-spacing: 0.5px;">
                            Meja Tamu
                        </h3>
                    </a>
                </div>
                <!-- End Column 3 -->

                <!-- Start Column 4 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                    <a class="product-item" href="produk">
                        <img src="{{ url('/beranda/assets/images/meja-6.png') }}" class="img-fluid product-thumbnail"
                            style="width: 250px;">
                        <h3 class="product-title text-capitalize fw-bold "
                            style="font-size: 1.1rem; letter-spacing: 0.5px;">
                            Meja Makan
                        </h3>
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
                    <p>Dengan bahan pilihan terbaik dan pengerjaan yang teliti, RUMAH Mebel menawarkan produk yang tahan
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
                        <img src="{{ url('/beranda/assets/images/ruangan-1.jpg') }}" alt="Image" class="img-fluid"
                            style="width: 400px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Why Choose Us Section -->

    {{-- start grid --}}
    <div class="we-help-section border-bottom pb-5 mb-5">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="imgs-grid">
                        <div class="grid grid-1">
                            <img src="{{ url('/beranda/assets/images/ruangan-1.jpg') }}" height="600" alt="Untree.co">
                        </div>
                        <div class="grid grid-2">
                            <img src="{{ url('/beranda/assets/images/ruangan-1.jpg') }}" height="350" alt="Untree.co">
                        </div>
                        <div class="grid grid-3">
                            <img src="{{ url('/beranda/assets/images/ruangan-1.jpg') }}" height="450" alt="Untree.co">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 ps-lg-5">
                    <h2 class="section-title mb-4">We Help You Make Modern Interior Design</h2>
                    <p>
                        "Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam
                        ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant
                        morbi tristique senectus et netus et malesuada."
                    </p>
                    <ul class="list-unstyled custom-list my-4">
                        <li>
                            "Donec vitae odio quis nisl dapibus malesuada"
                        </li>
                        <li>
                            "Donec vitae odio quis nisl dapibus malesuada"
                        </li>
                        <li>
                            "Donec vitae odio quis nisl dapibus malesuada"
                        </li>
                        <li>
                            "Donec vitae odio quis nisl dapibus malesuada"
                        </li>
                    </ul>
                    <p>
                        <a href="/produk" class="btn">Explore</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    {{-- end --}}

    <!-- Start Popular Product -->
    <style>
        .product-image {
            width: 100%;
            height: 180px;
            /* Sesuaikan tinggi gambar */
            object-fit: cover;
            /* Pastikan gambar tidak terdistorsi */
        }

        .product-image {
            width: 100%;
            height: 180px;
            /* Sesuaikan tinggi gambar */
            object-fit: cover;
            /* Pastikan gambar tidak terdistorsi */
        }

        .product-label {
            font-weight: bold;
            margin-top: 8px;
            font-size: 14px;
            color: #333;
        }

        .product-container {
            padding: 10px;
        }
    </style>

    <div class="container mt-5 border-bottom pb-4 mb-5" style="max-width: 1100px;">
        <h2 class="mb-5 mt-4 fw-bold text-uppercase text-dark text-center"
            style="font-size: 2rem; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Rekomendasi Produk Furniture Terlaris</h2>

        <div class="row g-3 justify-content-center"> <!-- g-4 memberikan jarak lebih besar antar produk -->

            <!-- Produk 1 -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="text-center product-container">
                    <img src="{{ url('/beranda/assets/images/meja-4.png') }}" alt="Meja Tamu"
                        class="img-fluid rounded shadow-sm product-image">
                    <div class="product-label">Meja Tamu</div>
                </div>
            </div>

            <!-- Produk 2 -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="text-center product-container">
                    <img src="{{ url('/beranda/assets/images/meja-6.png') }}" alt="Meja Tamu"
                        class="img-fluid rounded shadow-sm product-image">
                    <div class="product-label">Meja Tamu</div>
                </div>
            </div>

            <!-- Produk 3 -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="text-center product-container">
                    <img src="{{ url('/beranda/assets/images/meja-4.png') }}" alt="Meja Makan"
                        class="img-fluid rounded shadow-sm product-image">
                    <div class="product-label">Meja Makan</div>
                </div>
            </div>

            <!-- Produk 4 -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="text-center product-container">
                    <img src="{{ url('/beranda/assets/images/meja-6.png') }}" alt="Almari"
                        class="img-fluid rounded shadow-sm product-image">
                    <div class="product-label">Almari</div>
                </div>
            </div>

            <!-- Produk 5 -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="text-center product-container">
                    <img src="{{ url('/beranda/assets/images/meja-7.png') }}" alt="Almari TV"
                        class="img-fluid rounded shadow-sm product-image">
                    <div class="product-label">Almari TV</div>
                </div>
            </div>

            <!-- Produk 6 -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="text-center product-container">
                    <img src="{{ url('/beranda/assets/images/meja-4.png') }}" alt="Kursi Santai"
                        class="img-fluid rounded shadow-sm product-image">
                    <div class="product-label">Kursi Santai</div>
                </div>
            </div>

            <!-- Produk 7 -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="text-center product-container">
                    <img src="{{ url('/beranda/assets/images/meja-7.png') }}" alt="Meja Makan"
                        class="img-fluid rounded shadow-sm product-image">
                    <div class="product-label">Meja Makan</div>
                </div>
            </div>

            <!-- Produk 8 -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="text-center product-container">
                    <img src="{{ url('/beranda/assets/images/meja-8.png') }}" alt="Meja Makan"
                        class="img-fluid rounded shadow-sm product-image">
                    <div class="product-label">Meja Makan</div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Popular Product -->

    <!-- Start Testimonial Slider -->
    <div class="testimonial-section border-bottom pb-4 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto text-center text-uppercase text-primary">
                    <h1 class="section-title text-center mb-4"> Ulasan </h1>
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
                                                    odio quis nisl dapibus malesuada. Nullam ac aliquet velit.
                                                    Aliquam
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
                                                    odio quis nisl dapibus malesuada. Nullam ac aliquet velit.
                                                    Aliquam
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
                                                    odio quis nisl dapibus malesuada. Nullam ac aliquet velit.
                                                    Aliquam
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
