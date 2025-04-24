@extends('layouts.user.main')
@section('content')
<!-- Start Produk Section -->
<div class="produk">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h1 class="mb-5 mt-4 fw-bold text-uppercase text-primary">Koleksi Produk ESTA Mebel</h1>
                <p class="mb-5 text-secondary fs-5" style="margin-top: 20px;">Desta Mebel – Sentuhan Elegan untuk Rumah Anda!"
                    ✨ Hadirkan kenyamanan dan gaya dengan furnitur berkualitas tinggi yang dirancang khusus untuk Anda.
                    </p>
            </div>
        </div>
    </div>
    </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="produk-item text-center p-3 shadow-sm rounded">
                    <img src="{{ url('/beranda/assets/images/product-1.png') }}" class="img-fluid mb-3 rounded">
                    <h3 class="fw-bold">Nordic Chair</h3>
                    <p class="text-muted">Desain minimalis dengan bahan berkualitas, cocok untuk ruangan modern.</p>
                    <p class="fw-bold text-primary">Rp 1.500.000</p>
                    <a href="#" class="btn btn-secondary">Lihat Detail</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="produk-item text-center p-3 shadow-sm rounded">
                    <img src="{{ url('/beranda/assets/images/product-2.png') }}" class="img-fluid mb-3 rounded">
                    <h3 class="fw-bold">Luxury Sofa</h3>
                    <p class="text-muted">Sofa premium dengan kenyamanan maksimal, ideal untuk ruang tamu elegan.</p>
                    <p class="fw-bold text-primary">Rp 5.200.000</p>
                    <a href="#" class="btn btn-secondary">Lihat Detail</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="produk-item text-center p-3 shadow-sm rounded">
                    <img src="{{ url('/beranda/assets/images/product-3.png') }}" class="img-fluid mb-3 rounded">
                    <h3 class="fw-bold">Modern Desk</h3>
                    <p class="text-muted">Meja kerja elegan dengan desain ergonomis, cocok untuk produktivitas maksimal.</p>
                    <p class="fw-bold text-primary">Rp 2.800.000</p>
                    <a href="#" class="btn btn-secondary">Lihat Detail</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="produk-item text-center p-3 shadow-sm rounded">
                    <img src="{{ url('/beranda/assets/images/product-1.png') }}" class="img-fluid mb-3 rounded">
                    <h3 class="fw-bold">Nordic Chair</h3>
                    <p class="text-muted">Desain minimalis dengan bahan berkualitas, cocok untuk ruangan modern.</p>
                    <p class="fw-bold text-primary">Rp 1.500.000</p>
                    <a href="#" class="btn btn-secondary">Lihat Detail</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="produk-item text-center p-3 shadow-sm rounded">
                    <img src="{{ url('/beranda/assets/images/product-2.png') }}" class="img-fluid mb-3 rounded">
                    <h3 class="fw-bold">Luxury Sofa</h3>
                    <p class="text-muted">Sofa premium dengan kenyamanan maksimal, ideal untuk ruang tamu elegan.</p>
                    <p class="fw-bold text-primary">Rp 5.200.000</p>
                    <a href="#" class="btn btn-secondary">Lihat Detail</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="produk-item text-center p-3 shadow-sm rounded">
                    <img src="{{ url('/beranda/assets/images/product-3.png') }}" class="img-fluid mb-3 rounded">
                    <h3 class="fw-bold">Modern Desk</h3>
                    <p class="text-muted">Meja kerja elegan dengan desain ergonomis, cocok untuk produktivitas maksimal.</p>
                    <p class="fw-bold text-primary">Rp 2.800.000</p>
                    <a href="#" class="btn btn-secondary">Lihat Detail</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Produk Section -->
@endsection
