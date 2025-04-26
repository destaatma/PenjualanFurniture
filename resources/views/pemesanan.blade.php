@extends('layouts.user.main')

@section('content')
<div class="container mt-5">
    <h2 class="text-center fw-bold text-primary">Keranjang Belanja Anda</h2>
    <p class="text-center text-muted fs-5">Tinjau dan konfirmasi pesanan sebelum checkout.</p>

    <!-- Daftar Produk di Keranjang -->
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="cart-list"></tbody>
        </table>
    </div>

    <!-- Ringkasan Pemesanan -->
    <div class="row mt-4">
        <div class="col-md-6">
            <h4>Detail Pembayaran</h4>
            <p><strong>Total Belanja:</strong> <span id="total-price">Rp0</span></p>
            <p><strong>Diskon:</strong> <span id="discount">Rp0</span></p>
            <p><strong>Total Akhir:</strong> <span id="final-price">Rp0</span></p>
        </div>
        <div class="col-md-6">
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
                <button type="submit" class="btn btn-success w-100">Konfirmasi Pembelian</button>
            </form>
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
            let row = `<tr>
                <td><img src="${item.image}" class="img-thumbnail" style="width: 60px;"> ${item.name}</td>
                <td>Rp${item.price}</td>
                <td><input type="number" value="1" min="1" class="form-control" style="width: 60px;"></td>
                <td>Rp${item.price}</td>
                <td><button class="btn btn-danger btn-sm" onclick="removeItem('${item.name}')">Hapus</button></td>
            </tr>`;
            cartList.innerHTML += row;
            totalPrice += item.price;
        });

        let discount = totalPrice > 1000000 ? totalPrice * 0.1 : 0;
        let finalPrice = totalPrice - discount;

        document.getElementById('total-price').innerText = `Rp${totalPrice}`;
        document.getElementById('discount').innerText = `Rp${discount}`;
        document.getElementById('final-price').innerText = `Rp${finalPrice}`;
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
