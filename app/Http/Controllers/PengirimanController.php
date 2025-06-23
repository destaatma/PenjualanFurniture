<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Pengiriman;
use App\Services\FonnteService;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    // protected $fonnte;

    // // 3. Inject FonnteService melalui constructor agar bisa digunakan
    // public function __construct(FonnteService $fonnte)
    // {
    //     $this->fonnte = $fonnte;
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengirimans = Pengiriman::with('pemesanan.user', 'pemesanan.detailPemesanan.produk')->get();
        return view('admin.transaksi.pengiriman.index', compact('pengirimans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pemesanans = Pemesanan::all(); // Ambil daftar pemesanan untuk dropdown
        return view('admin.transaksi.pengiriman.create', compact('pemesanans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pemesanan_id' => 'required|exists:pemesanans,id',
            'tanggal_pengiriman' => 'required|date_format:Y-m-d\TH:i',
            'status_pengiriman' => 'required|string',
        ]);

        Pengiriman::create($request->all());

        return redirect()->route('admin.transaksi.pengiriman.index')
            ->with('success', 'Pengiriman berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengiriman $pengiriman)
    {
        $pemesanans = Pemesanan::all();
        return view('admin.transaksi.pengiriman.edit', compact('pengiriman', 'pemesanans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengiriman $pengiriman)
    {
        $request->validate([
            'pemesanan_id' => 'required|exists:pemesanans,id',
            'tanggal_pengiriman' => 'required|date_format:Y-m-d\TH:i',
            'status_pengiriman' => 'required|string',
        ]);

        $oldStatus = $pengiriman->status_pengiriman;
        $pengiriman->update($request->all());

        // ==========================================================
        // == 7. LOGIKA NOTIFIKASI SAAT STATUS DIUBAH MENJADI 'DIKIRIM' ==
        // ==========================================================
        if ($request->status_pengiriman === 'Dikirim' && $oldStatus !== 'Dikirim') {
            $pemesanan = Pemesanan::with('user')->find($pengiriman->pemesanan_id);
            if ($pemesanan) {
                // Teruskan objek $pengiriman yang diupdate
                $this->sendShippingNotification($pemesanan, $pengiriman);
            }
        }

        return redirect()->route('admin.transaksi.pengiriman.index')
            ->with('success', 'Pengiriman berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengiriman $pengiriman)
    {
        $pengiriman->delete();

        return redirect()->route('admin.transaksi.pengiriman.index')
            ->with('success', 'Pengiriman berhasil dihapus.');
    }

    protected function sendShippingNotification(Pemesanan $pemesanan, Pengiriman $pengiriman)
    {
        // if (!$pemesanan->user) {
        //     Log::warning("Notifikasi pengiriman gagal: User tidak ditemukan untuk pemesanan ID {$pemesanan->id}");
        //     return;
        // }

        // $user = $pemesanan->user;
        // $originalTargetNumber = $user->no_hp; // Pastikan nama kolom ini benar

        // if ($originalTargetNumber) {
        //     $cleanedNumber = preg_replace('/[^0-9]/', '', $originalTargetNumber);
        //     $targetFormatted = (substr($cleanedNumber, 0, 1) === '0') ? '62' . substr($cleanedNumber, 1) : $cleanedNumber;

        //     if (substr($targetFormatted, 0, 2) !== '62') {
        //         $targetFormatted = '62' . $targetFormatted;
        //     }

        //     // Pesan notifikasi disederhanakan
        //     $message  = "Halo {$user->name},\n\n";
        //     $message .= "Kabar baik! Pesanan Anda dengan nomor *#{$pemesanan->kode_pemesanan}* telah kami *KIRIM*.\n\n";

        //     // Tambahkan nomor HP kurir jika ada
        //     if (!empty($pengiriman->nomor_hp_kurir)) {
        //         $message .= "No. HP Kurir Pengirim: *{$pengiriman->nomor_hp_kurir}*\n";
        //     }

        //     $message .= "Mohon ditunggu kedatangan paketnya. Terima kasih!";

        //     $params = ['target' => $targetFormatted, 'message' => $message];

        //     try {
        //         $this->fonnte->sendAdvancedMessage($params);
        //     } catch (\Exception $e) {
        //         Log::error("Exception saat kirim notifikasi pengiriman: " . $e->getMessage());
        //     }
        // }
    }
}
