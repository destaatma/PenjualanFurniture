@extends('layouts.user.main')
@section('content')

<!-- Start Produk Section -->
<div class="produk">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h1 class="mb-5 mt-4 fw-bold text-uppercase text-primary">Koleksi Produk Rumah Mebel</h1>
                <p class="mb-5 text-secondary fs-5" style="margin-top: 20px;">
                    Desta Mebel – Sentuhan Elegan untuk Rumah Anda! ✨ Hadirkan kenyamanan dan gaya dengan furnitur berkualitas tinggi yang dirancang khusus untuk Anda.
                </p>
            </div>
        </div>

        <!-- Kategori Produk -->
        <div class="row mb-4">
            <div class="col-12">
                    <div class="row text-center">
                        <div class="col-md-3 col-sm-4 col-6 mb-2">
                            <button class="btn btn-light btn-sm w-100 filter-btn" data-filter="almari">Almari</button>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 mb-2">
                            <button class="btn btn-light btn-sm w-100 filter-btn" data-filter="kursi">Kursi</button>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 mb-2">
                            <button class="btn btn-light btn-sm w-100 filter-btn" data-filter="sofa">Jendela</button>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 mb-2">
                            <button class="btn btn-light btn-sm w-100 filter-btn" data-filter="meja">Meja</button>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 mb-2">
                            <button class="btn btn-light btn-sm w-100 filter-btn" data-filter="tempat-tidur">Tempat Tidur</button>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 mb-2">
                            <button class="btn btn-light btn-sm w-100 filter-btn" data-filter="rak">Meja Tamu</button>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 mb-2">
                            <button class="btn btn-light btn-sm w-100 filter-btn" data-filter="meja-makan">Meja Makan</button>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 mb-2">
                            <button class="btn btn-light btn-sm w-100 filter-btn" data-filter="kabinet">Kabinet Dapur</button>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 mb-2">
                            <button class="btn btn-light btn-sm w-100 filter-btn" data-filter="kabinet">Kabinet Dapur</button>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 mb-2">
                            <button class="btn btn-light btn-sm w-100 filter-btn" data-filter="kabinet">Kabinet Dapur</button>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 mb-2">
                            <button class="btn btn-light btn-sm w-100 filter-btn" data-filter="kabinet">Kabinet Dapur</button>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 mb-2">
                            <button class="btn btn-light btn-sm w-100 filter-btn" data-filter="kabinet">Kabinet Dapur</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Daftar Produk -->
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4 produk-item kursi">
                <div class="text-center p-3 shadow-sm rounded bg-light">
                    <img src="{{ url('/beranda/assets/images/meja-4.png') }}" class="img-fluid mb-3 rounded" style="width: 60%; max-width: 200px; height: auto;">
                    <h3 class="fw-bold">Nordic Chair</h3>
                    <p class="text-muted">Desain minimalis dengan bahan berkualitas, cocok untuk ruangan modern.</p>
                    <p class="fw-bold text-primary">Rp 1.500.000</p>
                    <a href="" class="btn btn-secondary">Lihat Detail</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4 produk-item sofa">
                <div class="text-center p-3 shadow-sm rounded bg-light">
                    <img src="{{ url('/beranda/assets/images/product-2.png') }}" class="img-fluid mb-3 rounded" style="width: 60%; max-width: 200px; height: auto;">
                    <h3 class="fw-bold">Luxury Sofa</h3>
                    <p class="text-muted">Sofa premium dengan kenyamanan maksimal, ideal untuk ruang tamu elegan.</p>
                    <p class="fw-bold text-primary">Rp 5.200.000</p>
                    <a href="#" class="btn btn-secondary">Lihat Detail</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4 produk-item meja">
                <div class="text-center p-3 shadow-sm rounded bg-light">
                    <img src="{{ url('/beranda/assets/images/product-3.png') }}" class="img-fluid mb-3 rounded"style="width: 60%; max-width: 200px; height: auto;">
                    <h3 class="fw-bold">Modern Desk</h3>
                    <p class="text-muted">Meja kerja elegan dengan desain ergonomis, cocok untuk produktivitas maksimal.</p>
                    <p class="fw-bold text-primary">Rp 2.800.000</p>
                    <a href="#" class="btn btn-secondary">Lihat Detail</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4 produk-item tempat-tidur">
                <div class="text-center p-3 shadow-sm rounded bg-light">
                    <img src="{{ url('/beranda/assets/images/product-1.png') }}" class="img-fluid mb-3 rounded"style="width: 60%; max-width: 200px; height: auto;">
                    <h3 class="fw-bold">Wooden Bed</h3>
                    <p class="text-muted">Tempat tidur nyaman dengan rangka kayu kokoh, cocok untuk istirahat berkualitas.</p>
                    <p class="fw-bold text-primary">Rp 4.500.000</p>
                    <a href="#" class="btn btn-secondary">Lihat Detail</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4 produk-item rak">
                <div class="text-center p-3 shadow-sm rounded bg-light">
                    <img src="{{ url('/beranda/assets/images/product-2.png') }}" class="img-fluid mb-3 rounded" style="width: 60%; max-width: 200px; height: auto;">
                    <h3 class="fw-bold">Minimalist Bookshelf</h3>
                    <p class="text-muted">Rak buku ramping dengan desain modern, sempurna untuk ruang baca.</p>
                    <p class="fw-bold text-primary">Rp 1.800.000</p>
                    <a href="#" class="btn btn-secondary">Lihat Detail</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Filter Produk menggunakan JavaScript -->
<script>
    document.querySelectorAll('.filter-btn').forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            document.querySelectorAll('.produk-item').forEach(item => {
                if (filter === 'all' || item.classList.contains(filter)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
</script>

@endsection
