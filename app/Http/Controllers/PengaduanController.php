<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\NaiveBayesService;

class PengaduanController extends Controller
{
    public function index()
    {
        // Ambil hanya pengaduan milik pengguna yang login
        $pengaduans = Pengaduan::where('user_id', Auth::id())
            ->latest()
            ->get();

        // Statistik pengaduan pengguna
        $totalPengaduan = $pengaduans->count();

        $menunggu = $pengaduans
            ->where('status', 'menunggu')
            ->count();

        $diproses = $pengaduans
            ->where('status', 'diproses')
            ->count();

        $selesai = $pengaduans
            ->where('status', 'selesai')
            ->count();

        return view('pengaduan.index', compact(
            'pengaduans',
            'totalPengaduan',
            'menunggu',
            'diproses',
            'selesai'
        ));
    }

    public function create()
    {
        return view('pengaduan.create');
    }

    public function store(
        Request $request,
        NaiveBayesService $naiveBayes
    ) {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi_pengaduan' => 'required|string',
            'lokasi' => 'required|string|max:255',
        ]);

        // Gabungkan judul dan isi laporan
        $teksPengaduan = $validated['judul'] . ' '
            . $validated['isi_pengaduan'];

        // Klasifikasi menggunakan Naive Bayes
        $kategori = $naiveBayes->klasifikasi($teksPengaduan);

        $validated['user_id'] = Auth::id();
        $validated['status'] = 'menunggu';
        $validated['kategori'] = $kategori;

        Pengaduan::create($validated);

        return redirect()
            ->route('pengaduan.index')
            ->with(
                'success',
                'Pengaduan berhasil dikirim dan diklasifikasikan.'
            );
    }
}
