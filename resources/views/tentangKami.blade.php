@extends('layouts.user.main')
@section('content')
    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-7">
                    <div class="hero-text-wrap">
                        <h2 class="fw-bold text-white">Tentang Kami - RUMAH Mebel</h2>
                        <div class="about-text px-2 py-3">
                            <p class="fs-5 text-light mb-4">
                                <strong>RUMAH Mebel</strong> hadir sebagai solusi bagi Anda yang menginginkan furnitur
                                berkualitas tinggi dengan
                                desain elegan dan fungsional. Kami percaya
                                bahwa setiap ruangan memiliki karakter unik, dan
                                furnitur yang tepat dapat memberikan sentuhan estetika serta kenyamanan maksimal.
                            </p>
                            <p class="fs-5 text-light mb-4">
                                Dengan pengalaman dalam industri mebel, kami berkomitmen menghadirkan produk yang dibuat
                                dari
                                bahan pilihan dan melalui proses produksi yang teliti. <em>Setiap produk dirancang dengan
                                    keseimbangan antara keindahan, daya tahan, dan fungsionalitas</em>, memastikan bahwa
                                setiap pembelian memberikan nilai terbaik bagi pelanggan.
                            </p>
                            <p class="fs-5 text-light mb-4">
                                Kami juga memahami bahwa setiap individu memiliki preferensi dan kebutuhan berbeda. Oleh
                                karena itu,RUMAH Mebel menawarkan berbagai pilihan desain,
                                warna, dan ukuran yang dapat disesuaikan
                                dengan selera dan ruang Anda. Dari furnitur <span class="text-primary">klasik hingga
                                    modern</span>, semua produk kami dirancang
                                untuk menghadirkan harmoni dalam setiap sudut rumah atau bisnis Anda.
                            </p>
                            <p class="fs-5 text-light mb-0">
                                Sebagai bagian dari komitmen kami terhadap <strong>kepuasan pelanggan</strong>, RUMAH Mebel
                                senantiasa mengutamakan
                                layanan yang ramah dan profesional. Kami siap membantu Anda menemukan furnitur terbaik yang
                                sesuai dengan kebutuhan, serta memberikan dukungan
                                penuh dalam setiap proses pembelian.
                            </p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="hero-img-wrap text-center">
                        <img src="{{ url('/beranda/assets/images/ruangan-2.jpg') }}"
                            style="width: 400px; height: auto; margin-top: -180px; margin-left: 50px;"
                            class="rounded shadow-lg" alt="Tentang Kami - Esta Mebel">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <!-- Start Testimonial Slider -->
    <div class="testimonial-section">
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
                                                    <img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
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