<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataLatihController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\ProfileController;
use App\Models\DataLatih;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Route;

// HALAMAN PUBLIK
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('/layanan', 'layanan')->name('layanan');
Route::view('/cara-kerja', 'cara-kerja')->name('cara-kerja');

// DASHBOARD
Route::get('/dashboard', function () {
    $statistik = [];

    if (auth()->user()?->role === 'admin') {
        $statistik = [
            'totalPengaduan' => Pengaduan::count(),
            'menunggu' => Pengaduan::where('status', 'menunggu')->count(),
            'diproses' => Pengaduan::where('status', 'diproses')->count(),
            'selesai' => Pengaduan::where('status', 'selesai')->count(),
            'totalDataLatih' => DataLatih::count(),
            'jumlahKategori' => DataLatih::distinct('kategori')->count('kategori'),
        ];
    }

    return view('dashboard', $statistik);
})->middleware(['auth', 'verified'])->name('dashboard');

// FITUR YANG MEMERLUKAN LOGIN
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.index');

    Route::get('/admin/pengaduan/{pengaduan}', [AdminController::class, 'show'])
        ->name('admin.pengaduan.show');

    Route::patch('/admin/pengaduan/{pengaduan}/status', [AdminController::class, 'updateStatus'])
        ->name('admin.pengaduan.status');

    Route::resource('admin/data-latih', DataLatihController::class)
        ->names('admin.data-latih');

    Route::get('/pengaduan', [PengaduanController::class, 'index'])
        ->name('pengaduan.index');

    Route::get('/pengaduan/create', [PengaduanController::class, 'create'])
        ->name('pengaduan.create');

    Route::post('/pengaduan', [PengaduanController::class, 'store'])
        ->name('pengaduan.store');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';