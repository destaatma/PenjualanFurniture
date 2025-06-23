<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pemesanan;
use App\Services\FonnteService;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    protected $fonnte;

    // Inject FonnteService melalui constructor
    public function __construct(FonnteService $fonnte)
    {
        $this->fonnte = $fonnte;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayarans = Pembayaran::all();
        $pemesanans = Pemesanan::all();
        return view('admin.transaksi.pembayaran.index', compact('pembayarans', 'pemesanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pemesanans = Pemesanan::all();
        return view('admin.transaksi.pembayaran.create', compact('pemesanans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pemesanan_id' => 'required|exists:pemesanans,id',
            'snap_token' => 'nullable',
            'jumlah_bayar' => 'required|numeric',
            'tanggal_pembayaran' => 'required|date_format:Y-m-d\TH:i',
            'status_pembayaran' => 'required|string|in:Menunggu,Dikonfirmasi,Selesai',
        ]);

        Pembayaran::create([
            'pemesanan_id' => $request->pemesanan_id,
            'snap_token' => $request->token,
            'jumlah_bayar' => $request->jumlah_bayar,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'status_pembayaran' => $request->status_pembayaran,
        ]);

        return redirect()->route('admin.transaksi.pembayaran.index')->with('success', 'Pembayaran berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        $pemesanans = Pemesanan::all();
        return view('admin.transaksi.pembayaran.edit', compact('pembayaran', 'pemesanans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        $request->validate([
            'pemesanan_id' => 'required|exists:pemesanans,id',
            'snap_token' => 'nullable|string|unique:pembayarans,snap_token,' . $pembayaran->id,
            'jumlah_bayar' => 'required|numeric',
            'tanggal_pembayaran' => 'required|date_format:Y-m-d\TH:i',
            'status_pembayaran' => 'required|string|in:Menunggu,Dikonfirmasi,Selesai',
        ]);

        $pembayaran->update([
            'pemesanan_id' => $request->pemesanan_id,
            'snap_token' => $request->token,
            'jumlah_bayar' => $request->jumlah_bayar,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'status_pembayaran' => $request->status_pembayaran,
        ]);

        // $oldStatus = $pembayaran->status_pembayaran;
        // $pembayaran->update($request->all());

        // if (($request->status_pembayaran === 'Dikonfirmasi' || $request->status_pembayaran === 'Selesai') && $oldStatus === 'Menunggu') {

        //     $pemesanan = Pemesanan::with(['user', 'details.produk'])->find($pembayaran->pemesanan_id);

        //     if (!$pemesanan || !$pemesanan->user) {
        //         Log::error("Data pemesanan/user tidak ditemukan untuk pembayaran ID: {$pembayaran->id}");
        //         return redirect()->route('admin.transaksi.pembayaran.index')->with('warning', 'Pembayaran diperbarui, tapi data user untuk notifikasi tidak lengkap.');
        //     }

        //     $user = $pemesanan->user;

        //     // ===================================
        //     // == KIRIM NOTIFIKASI EMAIL ==
        //     // ===================================
        //     try {
        //         // 3. Kirim email ke alamat email user
        //         Mail::to($user->email)->send(new PembayaranDikonfirmasiMail($pembayaran));
        //     } catch (\Exception $e) {
        //         Log::error("Gagal kirim notifikasi EMAIL ke {$user->email}: " . $e->getMessage());
        //     }


        //     // ===================================
        //     // == KIRIM NOTIFIKASI WHATSAPP (FONNTE) ==
        //     // ===================================
        //     $originalTargetNumber = $user->no_hp;
        //     if ($originalTargetNumber) {
        //         $cleanedNumber = preg_replace('/[^0-9]/', '', $originalTargetNumber);
        //         $targetFormatted = null;

        //         if (substr($cleanedNumber, 0, 2) === '62') {
        //             $targetFormatted = $cleanedNumber;
        //         } elseif (substr($cleanedNumber, 0, 1) === '0') {
        //             $targetFormatted = '62' . substr($cleanedNumber, 1);
        //         }

        //         if ($targetFormatted) {
        //             // ... (logika pesan Fonnte Anda tetap di sini) ...
        //             $message  = "Halo {$user->name},\n\n";
        //             $message .= "Pembayaran untuk pesanan Anda dengan nomor *#{$pemesanan->kode_pemesanan}* telah kami *KONFIRMASI*.\n\n";
        //             $message .= "Detail Pesanan:\n";

        //             foreach ($pemesanan->details as $detail) {
        //                 $message .= "- {$detail->produk->nama} (x{$detail->jumlah})\n";
        //             }

        //             $message .= "\nTotal Pembayaran: *Rp " . number_format($pembayaran->jumlah_bayar, 0, ',', '.') . "*\n\n";
        //             $message .= "Pesanan Anda akan segera kami proses. Terima kasih!";

        //             $params = ['target' => $targetFormatted, 'message' => $message];

        //             try {
        //                 $this->fonnte->sendAdvancedMessage($params);
        //             } catch (\Exception $e) {
        //                 Log::error("Exception saat kirim notifikasi Fonnte: " . $e->getMessage());
        //             }
        //         }
        //     }
        // }

        return redirect()->route('admin.transaksi.pembayaran.index')->with('success', 'Pembayaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect()->route('admin.transaksi.pembayaran.index')->with('success', 'Pembayaran berhasil dihapus.');
    }
}
