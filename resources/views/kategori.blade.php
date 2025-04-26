@extends('layouts.user.main')

@section('content')
<div class="container mt-5">
    <div class="row text-center">
        <div class="col-12">
            <h1 class="mb-5 fw-bold text-uppercase text-primary">Keranjang Belanja Desta Mebel</h1>
            <p class="mb-4 text-secondary fs-5">Produk yang telah Anda tambahkan ke keranjang.</p>
        </div>
    </div>

    <!-- Daftar Produk di Keranjang -->
    <div class="row justify-content-center" id="cart-list">
        <!-- Produk akan diisi melalui JavaScript -->
    </div>

    <!-- Ringkasan Checkout -->
    <div class="text-end mt-4">
        <h4>Total Belanja: <strong id="total-price">Rp0</strong></h4>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#checkoutModal">Lanjutkan ke Checkout</button>
    </div>
</div>

<!-- Modal Checkout -->
<div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Checkout Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <h4>Detail Pembayaran</h4>
                <p><strong>Total Belanja:</strong> <span id="modal-total-price">Rp0</span></p>

                <h4>Informasi Pembeli</h4>
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat Pengiriman</label>
                        <textarea class="form-control" id="address" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="payment-method" class="form-label">Metode Pembayaran</label>
                        <select class="form-select" id="payment-method">
                            <option value="Transfer Bank">Transfer Bank</option>
                            <option value="E-Wallet">E-Wallet</option>
                            <option value="COD">Bayar di Tempat</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Konfirmasi Pembelian</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function updateCart() {
        let cart = JSON.parse(sessionStorage.getItem('cart')) || [];
        let cartList = document.getElementById('cart-list');
        let totalPrice = 0;
        cartList.innerHTML = '';

        cart.forEach(item => {
            let productCard = `<div class="col-lg-3 col-md-4 mb-4">
                <div class="kategori-item text-center p-4 shadow-sm rounded bg-light">
                    <img src="${item.image}" class="img-fluid mb-3 rounded" style="width: 70%;">
                    <h5 class="fw-bold">${item.name}</h5>
                    <p class="small text-muted">Rp${item.price}</p>
                    <input type="number" value="1" min="1" class="form-control mb-2" style="width: 70px;">
                    <button class="btn btn-danger btn-sm" onclick="removeItem('${item.name}')">Hapus</button>
                </div>
            </div>`;
            cartList.innerHTML += productCard;
            totalPrice += item.price;
        });

        document.getElementById('total-price').innerText = `Rp${totalPrice}`;
        document.getElementById('modal-total-price').innerText = `Rp${totalPrice}`;
    }

    function removeItem(name) {
        let cart = JSON.parse(sessionStorage.getItem('cart')) || [];
        cart = cart.filter(item => item.name !== name);
        sessionStorage.setItem('cart', JSON.stringify(cart));
        updateCart();
    }

    document.addEventListener('DOMContentLoaded', updateCart);
</script>

@endsection
