<?php

namespace App\Exports;

use App\Models\Pemesanan; // Mengubah model ke Pemesanan
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

// Mengimplementasikan semua interface yang diperlukan untuk ekspor data Pemesanan
class PemesananExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles, WithEvents
{
    protected $index = 0;

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Mengambil semua data dari model Pemesanan dan relasi user-nya
        // Menggunakan with('user') untuk efisiensi query (menghindari N+1 problem)
        return Pemesanan::with('user')->get();
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
            'Nama Pelanggan',
            'Total Harga',
            'Tanggal Pemesanan',
            'Status Pemesanan',
        ];
    }

    /**
     * Memetakan data untuk setiap baris di Excel.
     *
     * @param mixed $pemesanan
     * @return array
     */
    public function map($pemesanan): array
    {
        $this->index++;

        return [
            $this->index,
            // Mengakses nama user melalui relasi. Pastikan relasi 'user' ada di model Pemesanan.
            $pemesanan->user->nama,
            $pemesanan->total_harga,
            $pemesanan->tanggal_pemesanan,
            $pemesanan->status_pemesanan,
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
        // Range diubah menjadi A1:E1 karena sekarang ada 5 kolom
        $sheet->getStyle('A1:E1')->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()->setRGB('A9DFBF'); // Warna hijau muda

        $sheet->getStyle('A1:E1')->getFont()->setBold(true);
        $sheet->getStyle('A1:E1')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A1:E1')->getAlignment()->setVertical('center');
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
