@extends('layouts.app')

@section('content')
<div class="container">
    <h2>ISI KERANJANG BELANJA</h2>

    @if(session()->has('cart') && count(session('cart')) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach(session('cart') as $id => $item)
            <tr>
                <td>
                    <img src="{{ asset('images/' . $item['image']) }}" width="50">
                    {{ $item['name'] }}
                </td>
                <td>Rp. {{ number_format($item['price'], 0, ',', '.') }}</td>
                <td>
                    <form action="{{ route('cart.update', $id) }}" method="POST">
                        @csrf
                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </td>
                <td>Rp. {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
                <td>
                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Keranjang belanja kosong.</p>
    @endif

    <div class="text-end">
        <a href="{{ route('checkout') }}" class="btn btn-success">Checkout</a>
    </div>
</div>
@endsection
