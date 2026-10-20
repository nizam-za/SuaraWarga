<x-app-layout>
    <x-slot name="header">
        <div class="space-y-1">
            <p class="text-sm font-bold uppercase tracking-wider text-teal-700">
                SUARAWARGA / ADMINISTRASI
            </p>
            <h2 class="text-2xl font-extrabold text-slate-900">
                Dashboard Admin
            </h2>
            <p class="text-base text-slate-600">
                Pantau laporan masyarakat dan kelola layanan pengaduan.
            </p>
        </div>
    </x-slot>

    @php
        $isAdmin = auth()->user()?->role === 'admin';
    @endphp

    <div class="min-h-screen bg-slate-100 py-8">
        <div class="mx-auto max-w-7xl space-y-8 px-4 sm:px-6 lg:px-8">

            {{-- Sambutan --}}
            <section class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-slate-950 via-slate-800 to-teal-900 p-6 text-white shadow-xl sm:p-10">
                <div class="relative z-10 max-w-3xl">
                    <span class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-2 text-sm font-semibold text-teal-100">
                        <span class="h-2.5 w-2.5 rounded-full bg-teal-400"></span>
                        Sistem Informasi Pengaduan Masyarakat
                    </span>

                    <h1 class="mt-5 text-3xl font-extrabold leading-tight sm:text-4xl">
                        Selamat datang, {{ auth()->user()->name }}!
                    </h1>

                    <p class="mt-4 max-w-2xl text-base leading-7 text-slate-200 sm:text-lg">
                        @if ($isAdmin)
                            Kelola laporan masyarakat, pantau perkembangan
                            penanganan, dan kelola data pembelajaran klasifikasi
                            untuk mendukung pelayanan publik yang lebih baik.
                        @else
                            Sampaikan pengaduan, pantau status laporan,
                            dan ikut membantu meningkatkan pelayanan di lingkunganmu.
                        @endif
                    </p>

                    <div class="mt-7 flex flex-wrap gap-3">
                        @if ($isAdmin)
                            <a href="{{ route('admin.index') }}"
                               class="inline-flex min-h-12 items-center justify-center rounded-xl bg-teal-500 px-6 py-3 text-base font-bold text-white shadow-md transition hover:bg-teal-400 focus:outline-none focus:ring-4 focus:ring-teal-300">
                                Kelola Pengaduan →
                            </a>

                            <a href="{{ route('admin.data-latih.index') }}"
                               class="inline-flex min-h-12 items-center justify-center rounded-xl border border-white/40 bg-white/10 px-6 py-3 text-base font-bold text-white transition hover:bg-white/20 focus:outline-none focus:ring-4 focus:ring-white/30">
                                Kelola Data Latih
                            </a>
                        @else
                            <a href="{{ route('pengaduan.create') }}"
                               class="inline-flex min-h-12 items-center justify-center rounded-xl bg-teal-500 px-6 py-3 text-base font-bold text-white shadow-md transition hover:bg-teal-400 focus:outline-none focus:ring-4 focus:ring-teal-300">
                                + Buat Pengaduan
                            </a>

                            <a href="{{ route('pengaduan.index') }}"
                               class="inline-flex min-h-12 items-center justify-center rounded-xl border border-white/40 bg-white/10 px-6 py-3 text-base font-bold text-white transition hover:bg-white/20 focus:outline-none focus:ring-4 focus:ring-white/30">
                                Lihat Pengaduan Saya
                            </a>
                        @endif
                    </div>
                </div>

                <div class="pointer-events-none absolute -right-16 -top-20 h-72 w-72 rounded-full border-[40px] border-white/5"></div>
                <div class="pointer-events-none absolute -bottom-24 right-20 h-64 w-64 rounded-full bg-teal-400/10 blur-3xl"></div>
            </section>

            {{-- Statistik Admin --}}
            @if ($isAdmin)
                <section>
                    <div class="mb-5">
                        <h3 class="text-2xl font-extrabold text-slate-900">
                            Ringkasan Pengaduan
                        </h3>
                        <p class="mt-2 text-base leading-6 text-slate-600">
                            Lihat jumlah laporan dan kondisi penanganannya saat ini.
                            Klik kartu untuk membuka halaman pengelolaan terkait.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-3">

                        {{-- Total Pengaduan --}}
                        <a href="{{ route('admin.index') }}"
                           class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-200 hover:-translate-y-1 hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-blue-200">
                            <div class="flex items-center justify-between gap-3">
                                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-100 text-3xl">
                                    📋
                                </div>
                                <span class="rounded-full bg-blue-100 px-3 py-1.5 text-sm font-bold text-blue-800">
                                    Semua laporan
                                </span>
                            </div>
                            <h4 class="mt-5 text-base font-bold text-slate-700">
                                Total Pengaduan
                            </h4>
                            <p class="mt-2 text-4xl font-extrabold text-slate-900">
                                {{ number_format($totalPengaduan ?? 0) }}
                            </p>
                            <p class="mt-3 text-sm leading-6 text-slate-600">
                                Jumlah seluruh laporan yang tercatat dalam sistem.
                            </p>
                            <p class="mt-4 text-sm font-bold text-blue-700 group-hover:underline">
                                Buka pengelolaan laporan →
                            </p>
                        </a>

                        {{-- Menunggu --}}
                        <a href="{{ route('admin.index') }}"
                           class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-200 hover:-translate-y-1 hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-amber-200">
                            <div class="flex items-center justify-between gap-3">
                                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-amber-100 text-3xl">
                                    ⏳
                                </div>
                                <span class="rounded-full bg-amber-100 px-3 py-1.5 text-sm font-bold text-amber-900">
                                    Perlu diperiksa
                                </span>
                            </div>
                            <h4 class="mt-5 text-base font-bold text-slate-700">
                                Pengaduan Menunggu
                            </h4>
                            <p class="mt-2 text-4xl font-extrabold text-slate-900">
                                {{ number_format($menunggu ?? 0) }}
                            </p>
                            <p class="mt-3 text-sm leading-6 text-slate-600">
                                Laporan yang masih menunggu pemeriksaan admin.
                            </p>
                            <p class="mt-4 text-sm font-bold text-amber-800 group-hover:underline">
                                Lihat laporan menunggu →
                            </p>
                        </a>

                        {{-- Diproses --}}
                        <a href="{{ route('admin.index') }}"
                           class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-200 hover:-translate-y-1 hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-violet-200">
                            <div class="flex items-center justify-between gap-3">
                                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-violet-100 text-3xl">
                                    ⚙️
                                </div>
                                <span class="rounded-full bg-violet-100 px-3 py-1.5 text-sm font-bold text-violet-900">
                                    Dalam penanganan
                                </span>
                            </div>
                            <h4 class="mt-5 text-base font-bold text-slate-700">
                                Sedang Diproses
                            </h4>
                            <p class="mt-2 text-4xl font-extrabold text-slate-900">
                                {{ number_format($diproses ?? 0) }}
                            </p>
                            <p class="mt-3 text-sm leading-6 text-slate-600">
                                Laporan yang sedang ditindaklanjuti oleh admin.
                            </p>
                            <p class="mt-4 text-sm font-bold text-violet-800 group-hover:underline">
                                Lihat laporan diproses →
                            </p>
                        </a>

                        {{-- Selesai --}}
                        <a href="{{ route('admin.index') }}"
                           class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-200 hover:-translate-y-1 hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-green-200">
                            <div class="flex items-center justify-between gap-3">
                                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-green-100 text-3xl">
                                    ✅
                                </div>
                                <span class="rounded-full bg-green-100 px-3 py-1.5 text-sm font-bold text-green-900">
                                    Tuntas
                                </span>
                            </div>
                            <h4 class="mt-5 text-base font-bold text-slate-700">
                                Pengaduan Selesai
                            </h4>
                            <p class="mt-2 text-4xl font-extrabold text-slate-900">
                                {{ number_format($selesai ?? 0) }}
                            </p>
                            <p class="mt-3 text-sm leading-6 text-slate-600">
                                Laporan yang status penanganannya sudah selesai.
                            </p>
                            <p class="mt-4 text-sm font-bold text-green-800 group-hover:underline">
                                Lihat laporan selesai →
                            </p>
                        </a>

                        {{-- Data Latih --}}
                        <a href="{{ route('admin.data-latih.index') }}"
                           class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-200 hover:-translate-y-1 hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-teal-200">
                            <div class="flex items-center justify-between gap-3">
                                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-teal-100 text-3xl">
                                    🧠
                                </div>
                                <span class="rounded-full bg-teal-100 px-3 py-1.5 text-sm font-bold text-teal-900">
                                    Naive Bayes
                                </span>
                            </div>
                            <h4 class="mt-5 text-base font-bold text-slate-700">
                                Total Data Latih
                            </h4>
                            <p class="mt-2 text-4xl font-extrabold text-slate-900">
                                {{ number_format($totalDataLatih ?? 0) }}
                            </p>
                            <p class="mt-3 text-sm leading-6 text-slate-600">
                                Contoh pengaduan yang digunakan untuk membantu
                                sistem mengenali kategori laporan.
                            </p>
                            <p class="mt-4 text-sm font-bold text-teal-800 group-hover:underline">
                                Kelola data pembelajaran →
                            </p>
                        </a>

                        {{-- Kategori --}}
                        <a href="{{ route('admin.data-latih.index') }}"
                           class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-200 hover:-translate-y-1 hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-pink-200">
                            <div class="flex items-center justify-between gap-3">
                                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-pink-100 text-3xl">
                                    🗂️
                                </div>
                                <span class="rounded-full bg-pink-100 px-3 py-1.5 text-sm font-bold text-pink-900">
                                    Klasifikasi
                                </span>
                            </div>
                            <h4 class="mt-5 text-base font-bold text-slate-700">
                                Kategori Data Latih
                            </h4>
                            <p class="mt-2 text-4xl font-extrabold text-slate-900">
                                {{ number_format($jumlahKategori ?? 0) }}
                            </p>
                            <p class="mt-3 text-sm leading-6 text-slate-600">
                                Jumlah kategori berbeda yang terdapat dalam data latih.
                            </p>
                            <p class="mt-4 text-sm font-bold text-pink-800 group-hover:underline">
                                Periksa kategori →
                            </p>
                        </a>
                    </div>
                </section>

            @else
                {{-- Menu Pengguna --}}
                <section>
                    <div class="mb-5">
                        <h3 class="text-2xl font-extrabold text-slate-900">
                            Layanan Pengaduan
                        </h3>
                        <p class="mt-2 text-base leading-6 text-slate-600">
                            Pilih layanan yang ingin kamu gunakan.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                        <a href="{{ route('pengaduan.create') }}"
                           class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-teal-200">
                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-teal-100 text-3xl">
                                ✍️
                            </div>
                            <h4 class="mt-5 text-xl font-extrabold text-slate-900">
                                Buat Pengaduan Baru
                            </h4>
                            <p class="mt-2 text-base leading-7 text-slate-600">
                                Laporkan masalah di lingkunganmu agar dapat diperiksa
                                dan ditindaklanjuti.
                            </p>
                            <p class="mt-5 text-base font-bold text-teal-800 group-hover:underline">
                                Isi formulir pengaduan →
                            </p>
                        </a>

                        <a href="{{ route('pengaduan.index') }}"
                           class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-blue-200">
                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-100 text-3xl">
                                📑
                            </div>
                            <h4 class="mt-5 text-xl font-extrabold text-slate-900">
                                Riwayat Pengaduan Saya
                            </h4>
                            <p class="mt-2 text-base leading-7 text-slate-600">
                                Periksa laporan yang pernah kamu kirim dan lihat
                                status penanganannya.
                            </p>
                            <p class="mt-5 text-base font-bold text-blue-800 group-hover:underline">
                                Lihat riwayat laporan →
                            </p>
                        </a>
                    </div>
                </section>
            @endif

            {{-- Panduan Sistem --}}
            <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                <div class="flex flex-col gap-5 sm:flex-row sm:items-start">
                    <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-teal-100 text-3xl">
                        💡
                    </div>

                    <div class="flex-1">
                        <h3 class="text-2xl font-extrabold text-slate-900">
                            Mengenal SuaraWarga
                        </h3>

                        <p class="mt-3 text-base leading-7 text-slate-600">
                            SuaraWarga adalah sistem informasi pengaduan masyarakat
                            untuk mencatat laporan dan membantu mengelompokkan kategori
                            pengaduan menggunakan metode klasifikasi Naive Bayes.
                        </p>

                        <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-3">
                            <div class="rounded-xl border border-slate-200 bg-slate-50 p-5">
                                <p class="text-base font-extrabold text-slate-800">
                                    01. Pencatatan
                                </p>
                                <p class="mt-2 text-sm leading-6 text-slate-600">
                                    Masyarakat mengirim laporan melalui formulir pengaduan.
                                </p>
                            </div>

                            <div class="rounded-xl border border-slate-200 bg-slate-50 p-5">
                                <p class="text-base font-extrabold text-slate-800">
                                    02. Klasifikasi
                                </p>
                                <p class="mt-2 text-sm leading-6 text-slate-600">
                                    Sistem membantu memperkirakan kategori laporan
                                    berdasarkan data pembelajaran.
                                </p>
                            </div>

                            <div class="rounded-xl border border-slate-200 bg-slate-50 p-5">
                                <p class="text-base font-extrabold text-slate-800">
                                    03. Tindak Lanjut
                                </p>
                                <p class="mt-2 text-sm leading-6 text-slate-600">
                                    Admin memeriksa laporan dan memperbarui status
                                    penanganannya.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <footer class="pb-3 text-center text-sm text-slate-500">
                © {{ date('Y') }} SuaraWarga.
                Sistem Informasi Pengaduan Masyarakat.
            </footer>

        </div>
    </div>
</x-app-layout>