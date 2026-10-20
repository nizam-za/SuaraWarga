<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Pengaduan | SuaraWarga</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 text-slate-800 antialiased">

<div class="min-h-screen lg:flex">

    {{-- Sidebar --}}
    <aside class="flex w-full flex-col bg-slate-950 text-white lg:fixed lg:inset-y-0 lg:w-64">
        <div class="flex items-center gap-3 border-b border-white/10 px-6 py-6">
            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-indigo-500 text-xl font-black">S</div>
            <div>
                <h1 class="text-lg font-bold">SuaraWarga</h1>
                <p class="text-xs text-slate-400">Panel Administrator</p>
            </div>
        </div>

        <nav class="flex flex-wrap gap-2 p-4 lg:flex-col">
            <a href="{{ route('admin.index') }}"
               class="rounded-xl px-4 py-3 text-slate-300 transition hover:bg-white/10 hover:text-white">
                ▦ Dashboard
            </a>
            <a href="{{ route('admin.index') }}#daftar-pengaduan"
               class="rounded-xl bg-indigo-500 px-4 py-3 font-semibold text-white">
                ▤ Data Pengaduan
            </a>
        </nav>

        <div class="mt-auto border-t border-white/10 p-4">
            <p class="mb-3 truncate text-sm text-slate-400">
                {{ auth()->user()->name }}
            </p>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="w-full rounded-xl border border-white/10 px-4 py-3 text-left text-sm text-slate-300 transition hover:bg-red-500/15 hover:text-red-300">
                    ↪ Keluar dari akun
                </button>
            </form>
        </div>
    </aside>

    {{-- Konten utama --}}
    <main class="min-w-0 flex-1 p-4 sm:p-6 lg:ml-64 lg:p-10">

        <div class="mb-8">
            <a href="{{ route('admin.index') }}"
               class="inline-flex items-center gap-2 text-sm font-semibold text-indigo-600 hover:text-indigo-800">
                ← Kembali ke Dashboard
            </a>

            <p class="mt-6 text-sm font-semibold text-indigo-600">MANAJEMEN LAPORAN</p>
            <h2 class="mt-1 text-3xl font-black tracking-tight text-slate-900">
                Detail Pengaduan
            </h2>
            <p class="mt-2 text-sm text-slate-500">
                Informasi lengkap laporan masyarakat yang tercatat di SuaraWarga.
            </p>
        </div>

        @php
            $statusWarna = [
                'menunggu' => 'bg-amber-100 text-amber-800 ring-amber-200',
                'diproses' => 'bg-blue-100 text-blue-800 ring-blue-200',
                'selesai' => 'bg-emerald-100 text-emerald-800 ring-emerald-200',
            ];
        @endphp

        <section class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
            <div class="bg-gradient-to-r from-indigo-600 to-violet-700 p-6 text-white sm:p-8">
                <p class="text-sm font-medium text-indigo-100">Judul Pengaduan</p>
                <h3 class="mt-2 text-2xl font-black">
                    {{ $pengaduan->judul }}
                </h3>

                <div class="mt-5 flex flex-wrap items-center gap-3">
                    <span class="rounded-full px-3 py-1.5 text-xs font-bold ring-1 ring-white/30 {{ $statusWarna[$pengaduan->status] ?? 'bg-white/20 text-white' }}">
                        {{ ucfirst($pengaduan->status) }}
                    </span>
                    <span class="rounded-full bg-white/15 px-3 py-1.5 text-xs font-semibold text-white">
                        {{ $pengaduan->kategori ?: 'Belum diklasifikasikan' }}
                    </span>
                </div>
            </div>

            <div class="grid gap-8 p-6 sm:p-8 lg:grid-cols-3">

                {{-- Isi laporan --}}
                <div class="space-y-6 lg:col-span-2">
                    <div>
                        <h4 class="text-sm font-bold uppercase tracking-wider text-slate-500">
                            Isi Pengaduan
                        </h4>
                        <div class="mt-3 rounded-2xl bg-slate-50 p-5 text-sm leading-7 text-slate-700">
                            {{ $pengaduan->isi_pengaduan }}
                        </div>
                    </div>

                    <div>
                        <h4 class="text-sm font-bold uppercase tracking-wider text-slate-500">
                            Lokasi Kejadian
                        </h4>
                        <div class="mt-3 flex items-start gap-3 rounded-2xl border border-slate-200 p-5">
                            <span class="text-xl">📍</span>
                            <p class="text-sm leading-6 text-slate-700">
                                {{ $pengaduan->lokasi ?: 'Lokasi belum dicantumkan.' }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Informasi laporan --}}
                <div class="space-y-5">
                    <div class="rounded-2xl border border-slate-200 p-5">
                        <h4 class="font-bold text-slate-900">Informasi Pelapor</h4>

                        <div class="mt-4 flex items-center gap-3">
                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-100 text-lg font-black text-indigo-700">
                                {{ strtoupper(substr($pengaduan->user?->name ?? 'T', 0, 1)) }}
                            </div>
                            <div class="min-w-0">
                                <p class="break-words font-semibold text-slate-800">
                                    {{ $pengaduan->user?->name ?? 'Tidak diketahui' }}
                                </p>
                                <p class="mt-1 text-xs text-slate-500">Pengirim laporan</p>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-2xl border border-slate-200 p-5">
                        <h4 class="font-bold text-slate-900">Ringkasan Laporan</h4>

                        <div class="mt-4 space-y-4">
                            <div>
                                <p class="text-xs text-slate-500">ID Pengaduan</p>
                                <p class="mt-1 font-semibold text-slate-800">#{{ $pengaduan->id }}</p>
                            </div>

                            <div>
                                <p class="text-xs text-slate-500">Kategori</p>
                                <p class="mt-1 font-semibold text-slate-800">
                                    {{ $pengaduan->kategori ?: 'Belum diklasifikasikan' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs text-slate-500">Status Saat Ini</p>
                                <p class="mt-1 font-semibold text-slate-800">
                                    {{ ucfirst($pengaduan->status) }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs text-slate-500">Tanggal Dibuat</p>
                                <p class="mt-1 font-semibold text-slate-800">
                                    {{ $pengaduan->created_at?->format('d-m-Y H:i') ?? '-' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs text-slate-500">Terakhir Diperbarui</p>
                                <p class="mt-1 font-semibold text-slate-800">
                                    {{ $pengaduan->updated_at?->format('d-m-Y H:i') ?? '-' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Ubah status --}}
            <div class="border-t border-slate-100 bg-slate-50 p-6 sm:p-8">
                <div class="max-w-xl">
                    <h4 class="font-bold text-slate-900">Perbarui Status Pengaduan</h4>
                    <p class="mt-1 text-sm text-slate-500">
                        Pilih status terbaru setelah meninjau laporan.
                    </p>

                    <form method="POST"
                          action="{{ route('admin.pengaduan.status', $pengaduan) }}"
                          class="mt-4 flex flex-col gap-3 sm:flex-row">
                        @csrf
                        @method('PATCH')

                        <select name="status"
                                aria-label="Pilih status pengaduan"
                                class="w-full rounded-xl border-slate-200 bg-white text-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="menunggu" @selected($pengaduan->status === 'menunggu')>
                                Menunggu
                            </option>
                            <option value="diproses" @selected($pengaduan->status === 'diproses')>
                                Diproses
                            </option>
                            <option value="selesai" @selected($pengaduan->status === 'selesai')>
                                Selesai
                            </option>
                        </select>

                        <button type="submit"
                                class="shrink-0 rounded-xl bg-indigo-600 px-5 py-3 text-sm font-bold text-white transition hover:bg-indigo-700">
                            Simpan Status
                        </button>
                    </form>
                </div>
            </div>
        </section>

        <footer class="py-8 text-center text-xs text-slate-400">
            SuaraWarga · Sistem Informasi Pengaduan Masyarakat
        </footer>
    </main>
</div>

</body>
</html>