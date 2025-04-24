@extends('layouts.user.main')
@section('content')
<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-7">
                <div class="hero-text-wrap">
                    <h2 class="fw-bold text-white">Tentang Kami - Esta Mebel</h2>
                    <p>Esta Mebel hadir sebagai solusi bagi Anda yang menginginkan furnitur berkualitas tinggi dengan
                        desain elegan dan fungsional. Kami percaya bahwa setiap ruangan memiliki karakter unik, dan
                        furnitur yang tepat dapat memberikan sentuhan estetika serta kenyamanan maksimal.</p>
                    <p>Dengan pengalaman dalam industri mebel, kami berkomitmen menghadirkan produk yang dibuat dari
                        bahan pilihan dan melalui proses produksi yang teliti. Setiap produk dirancang dengan
                        keseimbangan antara keindahan, daya tahan, dan fungsionalitas, memastikan bahwa setiap pembelian
                        memberikan nilai terbaik bagi pelanggan.</p>
                    <p>Kami juga memahami bahwa setiap individu memiliki preferensi dan kebutuhan berbeda. Oleh karena
                        itu, Esta Mebel menawarkan berbagai pilihan desain, warna, dan ukuran yang dapat disesuaikan
                        dengan selera dan ruang Anda. Dari furnitur klasik hingga modern, semua produk kami dirancang
                        untuk menghadirkan harmoni dalam setiap sudut rumah atau bisnis Anda.</p>
                    <p>Sebagai bagian dari komitmen kami terhadap kepuasan pelanggan, Esta Mebel senantiasa mengutamakan
                        layanan yang ramah dan profesional. Kami siap membantu Anda menemukan furnitur terbaik yang
                        sesuai dengan kebutuhan, serta memberikan dukungan penuh dalam setiap proses pembelian.</p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="hero-img-wrap text-center">
                    <img src="{{ url('/beranda/assets/images/product-1.png') }}" class="img-fluid rounded shadow-lg" alt="Tentang Kami - Esta Mebel">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->
@endsection
