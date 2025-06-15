@extends('layouts.user.main')

@section('content')
    <div class="tentang-kami py-5">
        <div class="container">

            <!-- Heading -->
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h1 class="fw-bold text-uppercase main-title">Tentang Kami - Rumah Mebel <br>
                    </h1>
                    <p class="lead text-secondary mt-3">
                        Lebih dari sekadar furnitur — kami hadir untuk mewujudkan ruang impian Anda.
                    </p>
                </div>
            </div>

            <!-- Image and Description -->
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="hero-image-wrapper text-center">
                        <img src="{{ asset('beranda/assets/images/ruangan-1.jpg') }}" alt="Interior elegan dari RUMAH Mebel"
                            class="img-fluid rounded shadow hero-image img-thumbnail" style="max-width: 80%;">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-text">
                        <p class="fs-5 text-secondary mb-3">
                            <strong class="text-dark">RUMAH Mebel</strong> bukan sekadar toko furnitur — kami adalah bagian
                            dari perjalanan Anda membangun rumah yang nyaman, estetis, dan penuh makna. Kami memahami bahwa
                            rumah bukan hanya tempat tinggal, melainkan tempat terciptanya momen berharga bersama keluarga,
                            tempat tumbuhnya kenangan, serta cermin dari kepribadian penghuninya.
                        </p>
                        <p class="fs-5 text-secondary mb-3">
                            Dari ruang tamu yang menyambut hangat, kamar tidur yang menenangkan, hingga ruang makan yang
                            mempererat kebersamaan — setiap ruangan memiliki cerita, dan furnitur kami adalah bagian dari
                            narasi itu. Kami hadir untuk membantu Anda merancang ruang yang tidak hanya fungsional, tetapi
                            juga membangkitkan rasa bahagia dan bangga setiap kali Anda melangkah masuk ke rumah.
                        </p>
                        <p class="fs-5 text-secondary mb-3">
                            Setiap produk kami dibuat dari bahan pilihan yang tahan lama, diproses oleh tenaga profesional
                            dengan standar kualitas tinggi, dan dirancang oleh tim kreatif yang mengutamakan detail dan
                            estetika. Kami percaya bahwa kualitas tidak harus mahal, dan desain mewah bisa dijangkau siapa
                            saja.
                        </p>
                        <p class="fs-5 text-secondary mb-3">
                            Apapun gaya Anda — klasik, modern, minimalis, rustic, atau elegan — koleksi kami siap memenuhi
                            setiap selera dan kebutuhan. Anda bisa menemukan kursi yang nyaman untuk bersantai, meja yang
                            kokoh untuk bekerja, hingga lemari yang fungsional untuk menyimpan kenangan.
                        </p>
                        <p class="fs-5 text-secondary mb-4">
                            Tidak hanya itu, layanan pelanggan kami siap membantu Anda memilih produk yang tepat, memberikan
                            saran penataan, hingga memastikan pengiriman berjalan aman dan tepat waktu. Kepuasan Anda adalah
                            prioritas utama kami.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Our Values -->
            <div class="row text-center mt-5 pt-5">
                <div class="col-12">
                    <h2 class="fw-bold section-title">Nilai-Nilai yang Kami Junjung</h2>
                    <p class="fs-5 text-secondary mb-3">
                        Kami berkomitmen untuk menghadirkan kualitas, inovasi, dan layanan terbaik
                        untuk Anda.
                    </p>
                </div>
            </div>

            <div class="row mt-4 g-4">
                <div class="col-md-4">
                    <div class="card text-center h-100 border-0 shadow-sm p-4 value-card">
                        <div class="value-icon mx-auto mb-3">
                            <i class="bi bi-patch-check-fill fs-1"></i>
                        </div>
                        <h4 class="fw-bold value-title">Kualitas Premium</h4>
                        <p class="text-secondary">Bahan terbaik dan proses produksi cermat demi daya tahan jangka panjang.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center h-100 border-0 shadow-sm p-4 value-card">
                        <div class="value-icon mx-auto mb-3">
                            <i class="bi bi-lightbulb-fill fs-1"></i>
                        </div>
                        <h4 class="fw-bold value-title">Desain Inovatif</h4>
                        <p class="text-secondary">Gaya modern dan klasik menyatu dalam desain yang berkarakter.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center h-100 border-0 shadow-sm p-4 value-card">
                        <div class="value-icon mx-auto mb-3">
                            <i class="bi bi-emoji-smile fs-1"></i>
                        </div>
                        <h4 class="fw-bold value-title">Kepuasan Anda</h4>
                        <p class="text-secondary">Pelayanan ramah dan personal untuk pengalaman belanja yang menyenangkan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        :root {
            --brand-primary: #a16a4c;
            --brand-background: #fdfaf6;
            --brand-dark-text: #4f3427;
        }

        .tentang-kami {
            background-color: var(--brand-background);
        }

        .main-title {
            font-size: 2.5rem;
            color: var(--brand-dark-text);
        }

        .text-brand {
            color: var(--brand-primary);
        }

        .welcome-title {
            font-size: 1.8rem;
            font-weight: bold;
            color: var(--brand-primary);
        }

        .hero-image-wrapper {
            background-color: #fff;
            padding: 1rem;
            border-radius: 0.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .hero-image-wrapper:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        }

        .value-card {
            background-color: #fff;
            border: 1px solid #eee;
            transition: all 0.3s ease;
        }

        .value-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(161, 106, 76, 0.15);
        }

        .value-icon {
            color: var(--brand-primary);
            transition: transform 0.3s ease;
        }

        .value-card:hover .value-icon {
            transform: scale(1.1);
        }

        .value-title {
            font-family: 'Georgia', serif;
            color: var(--brand-dark-text);
        }

        .btn-brand {
            background-color: var(--brand-primary);
            color: #fff;
            border-radius: 30px;
            transition: all 0.3s ease;
        }

        .btn-brand:hover {
            background-color: #8a533b;
            color: #fff;
        }
    </style>
@endsection