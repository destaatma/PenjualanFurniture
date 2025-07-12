@extends('layouts.admin.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 text-muted">Data Pemesanan</h1>
            <ol class="breadcrumb mb-4 bg-light p-3 rounded">
                <li class="breadcrumb-item"><a href="{{ route('admin.transaksi.pemesanan.index') }}"
                        class="text-info">Dashboard</a></li>
                <li class="breadcrumb-item active">Pemesanan</li>
            </ol>

            {{-- <div class="mb-3">
                <a href="{{ route('admin.transaksi.pemesanan.create') }}" class="btn btn-warning">
                    <i class="fas fa-plus-circle me-1"></i> Pemesanan
                </a>
            </div> --}}
            <a href="{{ route('pemesanan.export') }}" class="btn btn-success mb-3 col-mb-3">
                <i class="fas fa-file-excel"></i> Export excel
            </a>

            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-shopping-cart me-1"></i> Daftar Pemesanan
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatablesSimple" class="table table-bordered table-striped table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Produk</th>
                                    <th>Customer</th>
                                    <th>Total Harga</th>
                                    <th>Tanggal Pemesanan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pemesanans as $p)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($p->detailPemesanan && $p->detailPemesanan->count() > 0)
                                                @foreach ($p->detailPemesanan as $detail)
                                                    <div>{{ $detail->produk->nama ?? 'Produk tidak ditemukan' }}</div>
                                                @endforeach
                                            @else
                                                <div>{{ $p->nama_produk ?? '-' }}</div>
                                            @endif
                                        </td>
                                        <td>{{ $p->user->nama ?? '-' }}</td>
                                        <td>
                                            Rp
                                            @if ($p->detailPemesanan && $p->detailPemesanan->count() > 0)
                                                {{ number_format($p->detailPemesanan->sum('harga_subtotal'), 0, ',', '.') }}
                                            @else
                                                {{ number_format($p->total_harga, 0, ',', '.') }}
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($p->tanggal_pemesanan)->format('d-m-Y H:i') }}</td>
                                        <td>{{ ucfirst($p->status_pemesanan) }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('admin.transaksi.detail_pemesanan.index') }}"
                                                    class="btn btn-info btn-sm" title="Lihat Detail">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.transaksi.pemesanan.edit', $p->id) }}"
                                                    class="btn btn-warning btn-sm" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.transaksi.pemesanan.destroy', $p->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus pemesanan ini?')"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection