@extends('layouts.user.main')
@section('content')
<!-- Start Kategori Produk -->
<div class="container mt-5">
    <div class="row text-center">
        <div class="col-12">
            <h1 class="mb-5 fw-bold text-uppercase text-primary">Kategori Produk Desta Mebel</h1>
            <p class="mb-4 text-secondary fs-5">Pilih kategori yang sesuai dengan kebutuhan Anda.</p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-3 col-md-4 mb-4">
            <div class="kategori-item text-center p-4 shadow-sm rounded bg-light">
                <img src="{{ url('/beranda/assets/images/meja.png') }}" class="img-fluid mb-3 rounded" style="width: 70%;">
                <h5 class="fw-bold">Meja</h5>
                <p class="small text-muted">Beragam pilihan meja berkualitas untuk berbagai keperluan.</p>
                <a href="#" class="btn btn-sm btn-primary">Lihat Kategori</a>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 mb-4">
            <div class="kategori-item text-center p-4 shadow-sm rounded bg-light">
                <img src="{{ url('/beranda/assets/images/kursi.png') }}" class="img-fluid mb-3 rounded" style="width: 70%;">
                <h5 class="fw-bold">Kursi</h5>
                <p class="small text-muted">Temukan kursi nyaman dengan desain elegan.</p>
                <a href="#" class="btn btn-sm btn-primary">Lihat Kategori</a>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 mb-4">
            <div class="kategori-item text-center p-4 shadow-sm rounded bg-light">
                <img src="{{ url('/beranda/assets/images/almari.png') }}" class="img-fluid mb-3 rounded" style="width: 70%;">
                <h5 class="fw-bold">Almari</h5>
                <p class="small text-muted">Almari berkualitas tinggi dengan kapasitas luas.</p>
                <a href="#" class="btn btn-sm btn-primary">Lihat Kategori</a>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 mb-4">
            <div class="kategori-item text-center p-4 shadow-sm rounded bg-light">
                <img src="{{ url('/beranda/assets/images/sofa.png') }}" class="img-fluid mb-3 rounded" style="width: 70%;">
                <h5 class="fw-bold">Sofa</h5>
                <p class="small text-muted">Sofa elegan yang memberikan kenyamanan maksimal.</p>
                <a href="#" class="btn btn-sm btn-primary">Lihat Kategori</a>
            </div>
        </div>
    </div>
</div>
<!-- End Kategori Produk -->
@endsection
