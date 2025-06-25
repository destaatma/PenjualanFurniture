<?php

namespace App\Exports;

use App\Models\Pembayaran;
use Maatwebsite\Excel\Concerns\FromCollection;

class PembayaranExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Pembayaran::all();
    }

    public function headings()
    {
        return [
            'ID',
            'pemesanan_id',
            'snap_token',
            'jumlah_bayar',
            'tanggal_pembayaran',
            'status_pembayaran',
        ];
    }

    public function map($pembayaran)
    {
        return [
            $pembayaran->id,
            $pembayaran->pemesanan_id,
            $pembayaran->token,
            $pembayaran->jumlah_bayar,
            $pembayaran->tanggal_pembayaran,
            $pembayaran->status_pembayaran,
        ];
    }
}
