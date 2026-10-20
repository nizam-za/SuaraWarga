<x-app-layout>
    <div class="min-h-screen bg-slate-50 py-10">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">

            <div class="mb-8">
                <a href="{{ route('admin.data-latih.index') }}"
                   class="text-sm font-medium text-teal-700 hover:text-teal-900">
                    ← Kembali ke Data Latih
                </a>

                <h1 class="mt-4 text-3xl font-bold tracking-tight text-slate-800">
                    Edit Data Latih
                </h1>

                <p class="mt-2 text-sm text-slate-500">
                    Perbarui teks pengaduan atau kategori data latih.
                </p>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

                @if ($errors->any())
                    <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                        <p class="font-semibold">Data belum dapat diperbarui.</p>
                        <ul class="mt-2 list-inside list-disc">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.data-latih.update', $dataLatih->id) }}"
                      method="POST"
                      class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="teks_pengaduan"
                               class="mb-2 block text-sm font-semibold text-slate-700">
                            Teks Pengaduan
                        </label>

                        <textarea
                            id="teks_pengaduan"
                            name="teks_pengaduan"
                            rows="5"
                            required
                            minlength="5"
                            class="w-full rounded-xl border-slate-300 text-sm shadow-sm focus:border-teal-500 focus:ring-teal-500"
                        >{{ old('teks_pengaduan', $dataLatih->teks_pengaduan) }}</textarea>
                    </div>

                    <div>
                        <label for="kategori"
                               class="mb-2 block text-sm font-semibold text-slate-700">
                            Kategori Pengaduan
                        </label>

                        <select
                            id="kategori"
                            name="kategori"
                            required
                            class="w-full rounded-xl border-slate-300 text-sm shadow-sm focus:border-teal-500 focus:ring-teal-500"
                        >
                            <option value="">-- Pilih kategori --</option>

                            @foreach ([
                                'Infrastruktur',
                                'Kebersihan',
                                'Keamanan',
                                'Pelayanan Publik'
                            ] as $kategori)
                                <option
                                    value="{{ $kategori }}"
                                    @selected(old('kategori', $dataLatih->kategori) === $kategori)
                                >
                                    {{ $kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col-reverse gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:justify-end">
                        <a href="{{ route('admin.data-latih.index') }}"
                           class="inline-flex items-center justify-center rounded-xl border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                            Batal
                        </a>

                        <button type="submit"
                                class="inline-flex items-center justify-center rounded-xl bg-teal-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-teal-700">
                            Perbarui Data
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>