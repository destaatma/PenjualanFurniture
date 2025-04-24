@extends('layouts.user.main')

@section('content')
 <!-- Start Hero Section -->
 <div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Pemesanan Produk <span class="d-block">Desta Mebel</span></h1>
                    <p class="mb-4">Pesan furnitur berkualitas tinggi dengan desain elegan dan fungsional. Pilih produk favoritmu dan lakukan pemesanan dengan mudah.</p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    <img src="{{ url('/beranda/assets/images/couch.png') }}" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

@endsection
