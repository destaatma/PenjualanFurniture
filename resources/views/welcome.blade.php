@extends('layouts.user.main')

@section('content')

    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Produk Terbaik & <span class="d-block">Bahan Berkualitas</span></h1>
                        <p class="mb-4">
                            Rumah Mebel hadir untuk menghadirkan furnitur berkualitas tinggi dengan desain yang elegan dan
                            fungsional.
                            Kami percaya bahwa setiap ruangan memiliki karakter, dan furnitur yang tepat dapat memberikan
                            sentuhan estetika
                            serta kenyamanan maksimal.
                        </p>
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
    <!-- End Hero Section -->

    <!-- Start Product Section -->
    <div class="product-section border-bottom pb-4 mb-5">
        <div class="container">
            <div class="row">
                <!-- Column 1 -->
                <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                    <h2 class="mb-4 section-title">Dibuat dengan bahan berkualitas tinggi</h2>
                    <p class="mb-4">
                        Kami bukan sekadar penyedia furnitur, tetapi mitra dalam menciptakan ruang impian Anda.
                        Temukan inspirasi dan jadikan rumah atau bisnis Anda lebih istimewa dengan Rumah Mebel!
                    </p>
                    <p><a href="/produk" class="btn btn-secondary me-2">Beli Sekarang</a></p>
                </div>

                <!-- Produk Items -->
                @php
                    $products = [
                        ['id' => 3, 'src' => 'almari.png', 'name' => 'Almari Jati'],
                        ['id' => 1, 'src' => 'meja-8.png', 'name' => 'Kursi Tamu'],
                        ['id' => 5, 'src' => 'meja-6.png', 'name' => 'Meja Makan'],
                    ];
                @endphp

                @foreach ($products as $product)
                    <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                        <a class="product-item" href="{{ url('/produk/' . $product['id']) }}">
                            <img src="{{ url('/beranda/assets/images/' . $product['src']) }}"
                                class="img-fluid product-thumbnail" style="width: 250px;">
                            <h3 class="product-title text-capitalize fw-bold" style="font-size: 1.1rem; letter-spacing: 0.5px;">
                                {{ $product['name'] }}
                            </h3>
                        </a>
                    </div>
                @endforeach
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
                    <p>
                        Dengan bahan pilihan terbaik dan pengerjaan yang teliti, RUMAH Mebel menawarkan produk yang tahan
                        lama,
                        kuat, dan berkelas. Dari meja, kursi, lemari hingga set ruang tamu, setiap karya kami mencerminkan
                        dedikasi terhadap keindahan dan fungsionalitas.
                    </p>

                    <div class="row my-5">
                        @php
                            $features = [
                                ['icon' => 'truck.svg', 'title' => 'Cepat & Aman', 'desc' => 'Layanan pengiriman efisien, aman, dan terpercaya.'],
                                ['icon' => 'bag.svg', 'title' => 'Mudah dalam Pemesanan', 'desc' => 'Belanja mudah, pengiriman aman, kepuasan terjamin!'],
                                ['icon' => 'support.svg', 'title' => '24/7 Melayani', 'desc' => 'Kapan pun Anda membutuhkan kami, tim selalu siap.'],
                                ['icon' => 'return.svg', 'title' => 'Mudah Dalam Pengembalian', 'desc' => 'Proses pengembalian barang yang cepat dan mudah.'],
                            ];
                        @endphp

                        @foreach ($features as $feature)
                            <div class="col-6 col-md-6">
                                <div class="feature">
                                    <div class="icon">
                                        <img src="{{ url('/beranda/assets/images/' . $feature['icon']) }}" alt="Image"
                                            class="img-fluid">
                                    </div>
                                    <h3>{{ $feature['title'] }}</h3>
                                    <p>{{ $feature['desc'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="img-wrap">
                        <img src="{{ url('/beranda/assets/images/ruangan-2.jpg') }}" alt="Image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .imgs-grid img {
            width: 80%;
            height: auto;
            object-fit: cover;
            border-radius: 10px;
            /* opsional, untuk tampilan lebih halus */
        }
    </style>
    <!-- End Why Choose Us Section -->

    <!-- Start Grid Section -->
    <div class="we-help-section border-bottom pb-5 mb-5">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="imgs-grid">
                        <div class="grid grid-1">
                            <img src="{{ url('/beranda/assets/images/ruangan-5.jpg') }}" alt="Image">
                        </div>
                        <div class="grid grid-2">
                            <img src="{{ url('/beranda/assets/images/ruangan-6.jpg') }}" alt="Image">
                        </div>
                        <div class="grid grid-3">
                            <img src="{{ url('/beranda/assets/images/ruangan-3.jpg') }}" alt="Image">
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 ps-lg-5">
                    <h2 class="section-title mb-4">
                        Kami Siap Membantu Mewujudkan Desain Interior Modern Anda
                    </h2>
                    <p>
                        Kami menawarkan solusi desain interior yang praktis dan elegan — produk berkelas, fungsional, dan
                        disesuaikan dengan kebutuhan serta gaya hidup Anda. Wujudkan ruang yang tak hanya indah dipandang,
                        tetapi juga nyaman untuk digunakan.
                    </p>
                    <ul class="list-unstyled custom-list my-4">
                        <li>Furnitur minimalis dengan desain sederhana namun fungsional</li>
                        <li>Material berkualitas dari kayu alami dan elemen premium lainnya</li>
                        <li>Tata ruang terbuka yang mendukung aktivitas harian secara dinamis</li>
                        <li>Aksen dekoratif yang mencerminkan karakter dan kepribadian Anda</li>
                    </ul>
                    <p>
                        <a href="/produk" class="btn btn-primary">Explore</a>
                    </p>
                </div>

            </div>
        </div>
    </div>
    <style>
        .imgs-grid img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 10px;
            /* opsional, untuk tampilan lebih halus */
        }
    </style>
    <!-- End Grid Section -->

    <!-- Start Popular Product Section -->
    <style>
        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
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
        <h2 class="section-title mb-4 text-uppercase text-center">Rekomendasi Produk Furniture Terlaris</h2>

        <div class="row g-3 justify-content-center">
            @php
                $popularProducts = [
                    ['src' => 'meja-4.png', 'label' => 'Meja Tamu'],
                    ['src' => 'meja-6.png', 'label' => 'Meja Tamu'],
                    ['src' => 'meja-4.png', 'label' => 'Meja Makan'],
                    ['src' => 'meja-6.png', 'label' => 'Almari'],
                    ['src' => 'meja-7.png', 'label' => 'Almari TV'],
                    ['src' => 'meja-4.png', 'label' => 'Kursi Santai'],
                    ['src' => 'meja-7.png', 'label' => 'Meja Makan'],
                    ['src' => 'meja-8.png', 'label' => 'Meja Makan'],
                ];
            @endphp

            @foreach ($popularProducts as $product)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="text-center product-container">
                        <img src="{{ url('/beranda/assets/images/' . $product['src']) }}" alt="{{ $product['label'] }}"
                            class="img-fluid rounded shadow-sm product-image">
                        <div class="product-label">{{ $product['label'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- End Popular Product Section -->
@endsection
