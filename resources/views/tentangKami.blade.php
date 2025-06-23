@extends('layouts.user.main')

@section('content')
    <div class="tentang-kami py-5">
        <div class="container">

            <div class="row text-center mb-5">
                <div class="col-12">
                    <div class="intro-excerpt">
                        <h1 class="fw-bold text-uppercase main-title">Tentang Kami - OMAH Mebel <br>
                        </h1>
                        <p class="lead text-secondary mt-3">
                            Lebih dari sekadar furnitur — kami hadir untuk mewujudkan ruang impian Anda.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="hero-image-wrapper text-center">
                        <img src="{{ asset('beranda/assets/images/ruangan-1.jpg') }}" alt="Interior elegan dari OMAH Mebel"
                            class="img-fluid rounded shadow hero-image img-thumbnail" style="max-width: 80%;">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="intro-excerpt">
                            <p class="fs-5 text-secondary mb-3">
                                <strong class="text-dark">OMAH Mebel</strong> bukan sekadar toko furnitur — kami adalah
                                bagian
                                dari perjalanan Anda membangun rumah yang nyaman, estetis, dan penuh makna. Kami memahami
                                bahwa
                                rumah bukan hanya tempat tinggal, melainkan tempat terciptanya momen berharga bersama
                                keluarga,
                                tempat tumbuhnya kenangan, serta cermin dari kepribadian penghuninya.
                            </p>
                            <p class="fs-5 text-secondary mb-3">
                                Dari ruang tamu yang menyambut hangat, kamar tidur yang menenangkan, hingga ruang makan yang
                                mempererat kebersamaan — setiap ruangan memiliki cerita, dan furnitur kami adalah bagian
                                dari
                                narasi itu. Kami hadir untuk membantu Anda merancang ruang yang tidak hanya fungsional,
                                tetapi
                                juga membangkitkan rasa bahagia dan bangga setiap kali Anda melangkah masuk ke rumah.
                            </p>
                            <p class="fs-5 text-secondary mb-3">
                                Setiap produk kami dibuat dari bahan pilihan yang tahan lama, diproses oleh tenaga
                                profesional
                                dengan standar kualitas tinggi, dan dirancang oleh tim kreatif yang mengutamakan detail dan
                                estetika. Kami percaya bahwa kualitas tidak harus mahal, dan desain mewah bisa dijangkau
                                siapa
                                saja.
                            </p>
                            <p class="fs-5 text-secondary mb-3">
                                Apapun gaya Anda — klasik, modern, minimalis, rustic, atau elegan — koleksi kami siap
                                memenuhi
                                setiap selera dan kebutuhan. Anda bisa menemukan kursi yang nyaman untuk bersantai, meja
                                yang
                                kokoh untuk bekerja, hingga lemari yang fungsional untuk menyimpan kenangan.
                            </p>
                            <p class="fs-5 text-secondary mb-4">
                                Tidak hanya itu, layanan pelanggan kami siap membantu Anda memilih produk yang tepat,
                                memberikan
                                saran penataan, hingga memastikan pengiriman berjalan aman dan tepat waktu. Kepuasan Anda
                                adalah
                                prioritas utama kami.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

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
                        <h4 class="fw-bold value-title">Kualitas Terbaik</h4>
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
    <div class="row mt-5 pt-5 mb-5">
        <div class="col-lg-10 mx-auto">
            <div class="text-center mb-5">
                <h2 class="fw-bold section-title">Frequently Asked Questions (FAQ)</h2>
                <p class="fs-5 text-secondary">
                    Jawaban untuk pertanyaan yang paling sering diajukan.
                </p>
            </div>

            <div class="accordion accordion-flush" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Material atau kayu apa yang digunakan OMAH Mebel?
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Kami berkomitmen menggunakan bahan baku berkualitas tinggi, terutama <strong>kayu
                                pilihan</strong> yang telah melewati proses pemilihan. Hal
                            ini kami lakukan untuk memastikan setiap produk yang Anda terima tidak hanya indah secara
                            visual, tetapi juga kokoh, awet, dan tahan lama.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Mengapa saya harus memilih produk dari OMAH Mebel?
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Kepercayaan Anda adalah prioritas kami. Kami tidak hanya menjual produk, tetapi juga memberikan
                            jaminan kualitas dan kepuasan. Jika barang diterima dalam keadaan rusak karena faktor produksi,
                            kami siap bertanggung jawab untuk perbaikan atau bahkan penggantian. Jika kerusakan terjadi saat
                            pengiriman (lecet karena benturan), klaim dapat langsung diajukan kepada pihak kargo yang
                            bertanggung jawab saat serah terima barang.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            Bagaimana cara memesan produk?
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Sangat mudah! Anda bisa memesan dengan dua cara: <br>
                            <ol>
                                <li><strong>Melalui Website:</strong> Pilih produk yang Anda inginkan, masukkan ke
                                    keranjang, dan ikuti proses checkout.</li>
                                <li><strong>Melalui WhatsApp:</strong> Hubungi kami di <strong>0878 6035 2236 (a.n.
                                        Desta)</strong> untuk konsultasi atau pemesanan manual.</li>
                            </ol>
                            Untuk informasi lebih detail, silakan kunjungi halaman <a href="/caraPemesanan"
                                class="text-brand">Cara Pemesanan</a>.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                            Bagaimana sistem pembayarannya?
                        </button>
                    </h2>
                    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Untuk produk yang bersifat <strong>pre-order</strong> atau tidak ready stok, kami menerapkan
                            sistem pembayaran DP (Down Payment) sebesar <strong>50%</strong> di awal. Setelah pesanan Anda
                            selesai diproduksi dan siap kirim, kami akan menginformasikan Anda untuk melakukan pelunasan
                            sisa <strong>50%</strong>. Untuk produk ready stok, pembayaran penuh dapat dilakukan di awal.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                            Bagaimana sistem pengepakan atau atau pengiriman produk?
                        </button>
                    </h2>
                    <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Keamanan produk selama pengiriman adalah fokus utama kami. Setiap barang akan dipacking
                            menggunakan material standar keamanan tinggi seperti <strong>bubble wrap dan karton
                                tebal</strong> untuk meminimalisir risiko kerusakan atau lecet selama perjalanan.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingSix">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                            Apakah pesanan bisa dibatalkan?
                        </button>
                    </h2>
                    <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Tentu. Pembatalan pesanan dapat dilakukan selama pesanan Anda <strong>belum masuk ke tahap
                                proses produksi</strong>. Jika dibatalkan sebelum tahap tersebut, kami akan mengembalikan
                            dana Anda <strong>100%</strong>. Namun, pembatalan tidak dapat dilakukan jika proses produksi
                            sudah berjalan.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        /* 1. Import Font Poppins (selalu letakkan di paling atas) */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

        :root {
            --brand-primary: #a16a4c;
            --brand-background: #fdfaf6;
            --brand-dark-text: #4f3427;
        }

        /* 2. Terapkan Font Poppins ke container utama agar diwarisi oleh semua elemen di dalamnya */
        .tentang-kami {
            background-color: var(--brand-background);
            font-family: 'Poppins', sans-serif;
        }

        .main-title {
            font-size: 2.5rem;
            color: var(--brand-dark-text);
            font-weight: 700;
            /* Menggunakan fw-bold dari Poppins */
        }

        /* Mengatur font untuk judul-judul bagian lainnya */
        .section-title,
        .value-title,
        .accordion-button {
            font-weight: 600 !important;
            /* Menggunakan semi-bold dari Poppins */
        }

        .text-brand {
            color: var(--brand-primary) !important;
            text-decoration: none;
        }

        .text-brand:hover {
            text-decoration: underline;
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

        /* 3. Aturan font-family spesifik dihapus dari sini karena sudah di-handle oleh .tentang-kami */
        .value-title {
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

        /* 4. Aturan lama untuk intro-excerpt tidak lagi diperlukan */
    </style>
@endsection