<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Pengguna | SuaraWarga</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 text-slate-800 antialiased">

<div class="min-h-screen lg:flex">

    <!-- SIDEBAR -->
    <aside class="flex w-full flex-col bg-slate-950 text-white lg:fixed lg:inset-y-0 lg:w-64">
        <div class="flex items-center gap-3 border-b border-white/10 px-6 py-6">
            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-indigo-500 text-xl font-bold">
                S
            </div>
            <div>
                <h1 class="text-lg font-bold tracking-wide">SuaraWarga</h1>
                <p class="text-xs text-slate-400">Portal Pengaduan Masyarakat</p>
            </div>
        </div>

        <nav class="flex gap-2 overflow-x-auto p-4 lg:flex-1 lg:flex-col">
            <a href="{{ route('pengaduan.index') }}"
               class="flex shrink-0 items-center gap-3 rounded-xl bg-indigo-500/20 px-4 py-3 font-medium text-indigo-300">
                <span>▦</span> Dashboard
            </a>

            <a href="{{ route('pengaduan.create') }}"
               class="flex shrink-0 items-center gap-3 rounded-xl px-4 py-3 text-slate-300 transition hover:bg-white/10 hover:text-white">
                <span>＋</span> Buat Pengaduan
            </a>

            <a href="{{ route('pengaduan.index') }}"
               class="flex shrink-0 items-center gap-3 rounded-xl px-4 py-3 text-slate-300 transition hover:bg-white/10 hover:text-white">
                <span>▤</span> Riwayat Pengaduan
            </a>
        </nav>

        <div class="hidden border-t border-white/10 p-5 lg:block">
            <div class="mb-4 rounded-xl bg-white/5 p-4">
                <p class="text-xs text-slate-400">Login sebagai</p>
                <p class="mt-1 truncate font-semibold">{{ auth()->user()->name }}</p>
                <p class="mt-1 truncate text-xs text-slate-400">{{ auth()->user()->email }}</p>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full rounded-xl border border-white/10 px-4 py-3 text-left text-sm text-slate-300 transition hover:bg-red-500/10 hover:text-red-300">
                    ↪ Keluar dari akun
                </button>
            </form>
        </div>
    </aside>

    <!-- KONTEN UTAMA -->
    <main class="min-w-0 flex-1 lg:ml-64">

        <!-- HEADER -->
        <header class="sticky top-0 z-10 border-b border-slate-200 bg-white/90 px-5 py-4 backdrop-blur sm:px-8">
            <div class="mx-auto flex max-w-7xl items-center justify-between gap-4">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-widest text-indigo-600">
                        Portal Masyarakat
                    </p>
                    <h2 class="mt-1 text-lg font-bold sm:text-xl">Dashboard Saya</h2>
                </div>

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-indigo-100 font-bold text-indigo-700">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
            </div>
        </header>

        <div class="mx-auto max-w-7xl space-y-8 p-5 sm:p-8">

            <!-- SAPAAN -->
            <section class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-indigo-700 via-indigo-600 to-violet-600 p-7 text-white shadow-xl shadow-indigo-200 sm:p-10">
                <div class="relative z-10 max-w-2xl">
                    <span class="inline-flex rounded-full border border-white/20 bg-white/10 px-3 py-1 text-xs font-medium">
                        ✦ Layanan Aspirasi Warga
                    </span>

                    <h3 class="mt-5 text-3xl font-bold leading-tight sm:text-4xl">
                        Halo, {{ auth()->user()->name }}!
                    </h3>

                    <p class="mt-4 max-w-xl leading-7 text-indigo-100">
                        Suara Anda berarti. Sampaikan keluhan atau laporan mengenai lingkungan sekitar dan pantau perkembangannya melalui satu tempat.
                    </p>

                    <a href="{{ route('pengaduan.create') }}"
                       class="mt-7 inline-flex items-center gap-2 rounded-xl bg-white px-5 py-3 font-bold text-indigo-700 shadow-lg transition hover:-translate-y-0.5 hover:bg-indigo-50">
                        <span class="text-xl">＋</span>
                        Buat Pengaduan Baru
                    </a>
                </div>

                <div class="pointer-events-none absolute -right-12 -top-16 h-64 w-64 rounded-full border-[35px] border-white/10"></div>
                <div class="pointer-events-none absolute -bottom-24 right-24 h-56 w-56 rounded-full bg-white/5"></div>
            </section>

            <!-- NOTIFIKASI -->
            @if (session('success'))
                <div class="flex items-start gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 p-4 text-emerald-800">
                    <span class="text-xl">✓</span>
                    <div>
                        <p class="font-semibold">Berhasil!</p>
                        <p class="mt-1 text-sm">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="rounded-2xl border border-red-200 bg-red-50 p-4 text-red-700">
                    <p class="font-semibold">Ada data yang perlu diperbaiki.</p>
                    <ul class="mt-2 list-inside list-disc text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- STATISTIK -->
            <section>
                <div class="mb-5 flex items-end justify-between gap-3">
                    <div>
                        <h3 class="text-xl font-bold">Ringkasan Pengaduan</h3>
                        <p class="mt-1 text-sm text-slate-500">Pantau perkembangan laporan Anda.</p>
                    </div>
                    <span class="hidden text-sm text-slate-400 sm:block">Data akun Anda</span>
                </div>

                <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">

                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-slate-500">Total Laporan</span>
                            <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-indigo-50 text-xl text-indigo-600">▤</span>
                        </div>
                        <p class="mt-5 text-3xl font-bold">{{ $totalPengaduan }}</p>
                        <p class="mt-2 text-xs text-slate-400">Seluruh laporan Anda</p>
                    </div>

                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-slate-500">Menunggu</span>
                            <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-50 text-xl text-amber-600">◷</span>
                        </div>
                        <p class="mt-5 text-3xl font-bold text-amber-600">{{ $menunggu }}</p>
                        <p class="mt-2 text-xs text-slate-400">Menunggu tindak lanjut</p>
                    </div>

                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-slate-500">Diproses</span>
                            <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-50 text-xl text-blue-600">↻</span>
                        </div>
                        <p class="mt-5 text-3xl font-bold text-blue-600">{{ $diproses }}</p>
                        <p class="mt-2 text-xs text-slate-400">Sedang ditindaklanjuti</p>
                    </div>

                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-slate-500">Selesai</span>
                            <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-xl text-emerald-600">✓</span>
                        </div>
                        <p class="mt-5 text-3xl font-bold text-emerald-600">{{ $selesai }}</p>
                        <p class="mt-2 text-xs text-slate-400">Laporan telah selesai</p>
                    </div>

                </div>
            </section>

            <!-- RIWAYAT -->
            <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="flex flex-col justify-between gap-3 border-b border-slate-100 p-6 sm:flex-row sm:items-center">
                    <div>
                        <h3 class="text-xl font-bold">Riwayat Pengaduan</h3>
                        <p class="mt-1 text-sm text-slate-500">Daftar laporan yang pernah Anda kirim.</p>
                    </div>
                    <span class="self-start rounded-full bg-slate-100 px-3 py-1.5 text-xs font-semibold text-slate-600">
                        {{ $totalPengaduan }} laporan
                    </span>
                </div>

                @if ($pengaduans->isEmpty())
                    <div class="px-6 py-16 text-center">
                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-indigo-50 text-3xl">▤</div>
                        <h4 class="mt-5 text-lg font-bold">Belum Ada Pengaduan</h4>
                        <p class="mt-2 text-sm text-slate-500">Buat laporan pertama Anda untuk memulai.</p>
                        <a href="{{ route('pengaduan.create') }}"
                           class="mt-5 inline-flex rounded-xl bg-indigo-600 px-5 py-3 font-semibold text-white hover:bg-indigo-700">
                            Buat Pengaduan
                        </a>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                                <tr>
                                    <th class="px-6 py-4">Detail Pengaduan</th>
                                    <th class="px-6 py-4">Kategori</th>
                                    <th class="px-6 py-4">Status</th>
                                    <th class="px-6 py-4">Tanggal</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-slate-100">
                                @foreach ($pengaduans as $pengaduan)
                                    <tr class="transition hover:bg-slate-50/80">
                                        <td class="min-w-64 px-6 py-5">
                                            <p class="font-bold text-slate-800">
                                                {{ $pengaduan->judul }}
                                            </p>
                                            <p class="mt-2 max-w-md leading-6 text-slate-500">
                                                {{ $pengaduan->isi_pengaduan }}
                                            </p>
                                            <p class="mt-2 text-xs text-slate-400">
                                                Lokasi: {{ $pengaduan->lokasi }}
                                            </p>
                                        </td>

                                        <td class="whitespace-nowrap px-6 py-5">
                                            <span class="inline-flex rounded-lg bg-violet-50 px-3 py-1.5 text-xs font-semibold text-violet-700">
                                                {{ $pengaduan->kategori ?: 'Belum diklasifikasikan' }}
                                            </span>
                                        </td>

                                        <td class="whitespace-nowrap px-6 py-5">
                                            @php
                                                $warnaStatus = match ($pengaduan->status) {
                                                    'menunggu' => 'bg-amber-50 text-amber-700 ring-amber-200',
                                                    'diproses' => 'bg-blue-50 text-blue-700 ring-blue-200',
                                                    'selesai' => 'bg-emerald-50 text-emerald-700 ring-emerald-200',
                                                    default => 'bg-slate-100 text-slate-600 ring-slate-200',
                                                };
                                            @endphp

                                            <span class="inline-flex items-center gap-2 rounded-full px-3 py-1.5 text-xs font-bold ring-1 ring-inset {{ $warnaStatus }}">
                                                <span class="h-1.5 w-1.5 rounded-full bg-current"></span>
                                                {{ ucfirst($pengaduan->status) }}
                                            </span>
                                        </td>

                                        <td class="whitespace-nowrap px-6 py-5 text-slate-500">
                                            {{ $pengaduan->created_at?->format('d M Y') ?? '-' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </section>

            <footer class="pb-4 text-center text-xs text-slate-400">
                © {{ date('Y') }} SuaraWarga · Sistem Informasi Pengaduan Masyarakat
            </footer>

        </div>
    </main>
</div>

</body>
</html>
