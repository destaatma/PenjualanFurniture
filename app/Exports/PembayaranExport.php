<?php

namespace App\Exports;

use App\Models\Pembayaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

// Implementasikan semua interface yang diperlukan
class PembayaranExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles, WithEvents
{
    protected $index = 0;

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Mengambil semua data dari model Pembayaran
        return Pembayaran::all();
    }

    /**
     * Menentukan header untuk file Excel.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'No',
            'ID Pemesanan',
            'Token', // Diubah dari 'snap_token' menjadi 'Token' agar sesuai dengan map
            'Jumlah Bayar',
            'Tanggal Pembayaran',
            'Status Pembayaran',
        ];
    }

    /**
     * Memetakan data untuk setiap baris di Excel.
     *
     * @param mixed $pembayaran
     * @return array
     */
    public function map($pembayaran): array
    {
        $this->index++;

        return [
            $this->index,
            $pembayaran->pemesanan_id,
            $pembayaran->token, // Pastikan kolom di database Anda adalah 'token'
            $pembayaran->jumlah_bayar,
            $pembayaran->tanggal_pembayaran,
            $pembayaran->status_pembayaran,
        ];
    }

    /**
     * Menerapkan style pada sheet.
     *
     * @param Worksheet $sheet
     */
    public function styles(Worksheet $sheet)
    {
        // Menerapkan style pada baris header (baris 1)
        $sheet->getStyle('A1:F1')->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()->setRGB('A9DFBF'); // Warna hijau muda

        $sheet->getStyle('A1:F1')->getFont()->setBold(true);
        $sheet->getStyle('A1:F1')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A1:F1')->getAlignment()->setVertical('center');
    }

    /**
     * Mendaftarkan event yang akan dijalankan.
     *
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            // Event ini akan berjalan setelah sheet selesai dibuat
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $highestRow = $sheet->getHighestRow();
                $highestCol = $sheet->getHighestColumn();

                // Menambahkan border ke seluruh sel yang berisi data
                $sheet->getStyle("A1:{$highestCol}{$highestRow}")
                    ->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
            }
        ];
    }
}
