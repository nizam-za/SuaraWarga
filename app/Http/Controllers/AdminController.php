<?php

namespace App\Http\Controllers;

use App\Models\DataLatih;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    private function pastikanAdmin(): void
    {
        abort_unless(
            Auth::user()?->role === 'admin',
            403,
            'Halaman ini hanya dapat diakses oleh admin.'
        );
    }

    public function index(Request $request)
    {
        $this->pastikanAdmin();

        // Statistik keseluruhan pengaduan
        $totalPengaduan = Pengaduan::count();

        $menunggu = Pengaduan::where('status', 'menunggu')->count();

        $diproses = Pengaduan::where('status', 'diproses')->count();

        $selesai = Pengaduan::where('status', 'selesai')->count();

        // Statistik data latih
        $totalDataLatih = DataLatih::count();

        $jumlahKategori = DataLatih::query()
            ->whereNotNull('kategori')
            ->where('kategori', '!=', '')
            ->distinct()
            ->count('kategori');

        // Pilihan kategori untuk filter
        $kategoriList = Pengaduan::query()
            ->whereNotNull('kategori')
            ->where('kategori', '!=', '')
            ->distinct()
            ->orderBy('kategori')
            ->pluck('kategori');

        // Query daftar pengaduan
        $query = Pengaduan::with('user')->latest();

        // Pencarian judul, isi, lokasi, atau nama pelapor
        if ($request->filled('cari')) {
            $cari = trim($request->input('cari'));

            $query->where(function ($subQuery) use ($cari) {
                $subQuery
                    ->where('judul', 'like', '%' . $cari . '%')
                    ->orWhere('isi_pengaduan', 'like', '%' . $cari . '%')
                    ->orWhere('lokasi', 'like', '%' . $cari . '%')
                    ->orWhereHas('user', function ($userQuery) use ($cari) {
                        $userQuery->where('name', 'like', '%' . $cari . '%');
                    });
            });
        }

        // Filter status
        if ($request->filled('status')) {
            $status = $request->input('status');

            if (in_array($status, ['menunggu', 'diproses', 'selesai'], true)) {
                $query->where('status', $status);
            }
        }

        // Filter kategori
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->input('kategori'));
        }

        // Pagination dan mempertahankan filter ketika pindah halaman
        $pengaduans = $query
            ->paginate(10)
            ->withQueryString();

        // Jumlah hasil setelah pencarian/filter
        $jumlahHasil = $pengaduans->total();

        return view('admin.index', compact(
            'pengaduans',
            'totalPengaduan',
            'menunggu',
            'diproses',
            'selesai',
            'totalDataLatih',
            'jumlahKategori',
            'kategoriList',
            'jumlahHasil'
        ));
    }

    public function show(Pengaduan $pengaduan)
    {
        $this->pastikanAdmin();

        $pengaduan->load('user');

        return view('admin.show', compact('pengaduan'));
    }

    public function updateStatus(Request $request, Pengaduan $pengaduan)
    {
        $this->pastikanAdmin();

        $validated = $request->validate([
            'status' => [
                'required',
                Rule::in(['menunggu', 'diproses', 'selesai']),
            ],
        ]);

        $pengaduan->update($validated);

        return redirect()
            ->route('admin.index')
            ->with('success', 'Status pengaduan berhasil diperbarui.');
    }
}