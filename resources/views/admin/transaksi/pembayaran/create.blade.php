@extends('layouts.admin.app')

{{-- Menambahkan style untuk Select2 di bagian head --}}
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@endpush

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 text-muted">Tambah Pembayaran</h1>
            <ol class="breadcrumb mb-4 bg-light p-3 rounded">
                <li class="breadcrumb-item">
                    {{-- Mengarahkan ke index pembayaran --}}
                    <a href="{{ route('admin.transaksi.pembayaran.index') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Tambah Pembayaran</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-credit-card me-1"></i> Tambah Pembayaran
                </div>
                <div class="card-body">
                    {{-- Menampilkan error validasi jika ada --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Form action mengarah ke store pembayaran --}}
                    <form action="{{ route('admin.transaksi.pembayaran.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="pemesanan_id" class="form-label">Pemesanan</label>
                            {{-- Dropdown untuk memilih pemesanan yang akan dibayar --}}
                            <select name="pemesanan_id" id="pemesanan_id" class="form-select select2" required>
                                <option value="" disabled selected>Pilih Pemesanan...</option>

                                @forelse($pemesanans as $p)
                                    {{-- Menambahkan atribut data-harga untuk JavaScript --}}
                                    <option value="{{ $p->id }}" data-harga="{{ $p->total_harga }}">
                                        {{-- Menampilkan info lengkap: Nama Pelanggan - Produk - Harga --}}
                                        <strong>{{ $p->user->nama ?? 'Guest' }}</strong> -
                                        @foreach($p->detailPemesanan as $detail)
                                            {{ $detail->produk->nama }}{{ !$loop->last ? ', ' : '' }}
                                        @endforeach
                                        - (Rp{{ number_format($p->total_harga, 0, ',', '.') }})
                                    </option>
                                @empty
                                    <option value="" disabled>Tidak ada pemesanan yang perlu dibayar</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="jumlah_bayar" class="form-label">Jumlah Bayar</label>
                            {{-- Input ini akan diisi otomatis oleh JavaScript --}}
                            <input type="number" name="jumlah_bayar" class="form-control" id="jumlah_bayar"
                                placeholder="Jumlah akan terisi otomatis setelah memilih pesanan" required readonly>
                        </div>

                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i>
                            Token pembayaran (snap_token) hanya akan dibuat jika pembayaran dilakukan melalui Midtrans oleh
                            pelanggan. Untuk pembayaran manual, kolom ini akan kosong.
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_pembayaran" class="form-label">Tanggal Pembayaran</label>
                            <input type="datetime-local" name="tanggal_pembayaran" id="tanggal_pembayaran"
                                class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                            {{-- Opsi status yang relevan untuk pembayaran --}}
                            <select name="status_pembayaran" id="status_pembayaran" class="form-select" required>
                                <option value="" disabled selected>Pilih Status</option>
                                <option value="Menunggu">Menunggu</option>
                                <option value="Selesai">Selesai</option>
                                <option value="Gagal">Gagal</option>
                                <option value="Dibatalkan">Dibatalkan</option>
                            </select>
                        </div>


                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <a href="{{ route('admin.transaksi.pembayaran.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

{{-- Menambahkan script untuk Select2 dan otomatisasi form --}}
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            // Inisialisasi Select2 pada dropdown pemesanan
            $('.select2').select2({
                theme: "bootstrap-5",
                placeholder: $(this).data('placeholder'),
            });

            // Fungsi untuk mengatur tanggal dan waktu saat ini
            function setCurrentDateTime() {
                const now = new Date();
                now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
                document.getElementById('tanggal_pembayaran').value = now.toISOString().slice(0, 16);
            }

            // Panggil fungsi saat halaman dimuat
            setCurrentDateTime();

            // Event listener ketika pilihan pada dropdown pemesanan berubah
            $('#pemesanan_id').on('change', function () {
                // Mengambil harga dari atribut 'data-harga' pada option yang dipilih
                const selectedOption = $(this).find('option:selected');
                const harga = selectedOption.data('harga');

                // Mengisi input 'jumlah_bayar' dengan harga yang didapat
                // dan membuatnya bisa diedit jika perlu
                if (harga) {
                    $('#jumlah_bayar').val(harga).prop('readonly', false);
                } else {
                    $('#jumlah_bayar').val('').prop('readonly', true);
                }
            });
        });
    </script>
@endpush