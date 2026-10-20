<?php

namespace App\Http\Controllers;

use App\Models\DataLatih;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataLatihController extends Controller
{
    private function pastikanAdmin(): void
    {
        abort_unless(
            Auth::user()?->role === 'admin',
            403,
            'Halaman ini hanya dapat diakses oleh admin.'
        );
    }

    public function index()
    {
        $this->pastikanAdmin();

        $dataLatih = DataLatih::latest()->paginate(10);

        $totalData = DataLatih::count();

        $jumlahKategori = DataLatih::select('kategori')
            ->distinct()
            ->count('kategori');

        return view('admin.data-latih.index', compact(
            'dataLatih',
            'totalData',
            'jumlahKategori'
        ));
    }

    public function create()
    {
        $this->pastikanAdmin();

        return view('admin.data-latih.create');
    }

    public function store(Request $request)
    {
        $this->pastikanAdmin();

        $validated = $request->validate([
            'teks_pengaduan' => 'required|string|min:5',
            'kategori' => 'required|string|max:100',
        ]);

        DataLatih::create($validated);

        return redirect()
            ->route('admin.data-latih.index')
            ->with('success', 'Data latih berhasil ditambahkan.');
    }

    public function show(DataLatih $dataLatih)
    {
        $this->pastikanAdmin();

        return view('admin.data-latih.show', compact('dataLatih'));
    }

    public function edit(DataLatih $dataLatih)
    {
        $this->pastikanAdmin();

        return view('admin.data-latih.edit', compact('dataLatih'));
    }

    public function update(Request $request, DataLatih $dataLatih)
    {
        $this->pastikanAdmin();

        $validated = $request->validate([
            'teks_pengaduan' => 'required|string|min:5',
            'kategori' => 'required|string|max:100',
        ]);

        $dataLatih->update($validated);

        return redirect()
            ->route('admin.data-latih.index')
            ->with('success', 'Data latih berhasil diperbarui.');
    }

    public function destroy(DataLatih $dataLatih)
    {
        $this->pastikanAdmin();

        $dataLatih->delete();

        return redirect()
            ->route('admin.data-latih.index')
            ->with('success', 'Data latih berhasil dihapus.');
    }
}