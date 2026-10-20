<x-app-layout>
    <div style="min-height:100vh;background:#f1f5f9;padding:40px 16px 60px;">
        <div style="max-width:850px;margin:0 auto;">

            {{-- HEADER --}}
            <div style="margin-bottom:28px;">
                <a href="{{ route('pengaduan.index') }}"
                   style="display:inline-block;color:#0f766e;font-size:14px;
                          font-weight:700;text-decoration:none;margin-bottom:18px;">
                    ← Kembali ke Pengaduan Saya
                </a>

                <div style="background:linear-gradient(135deg,#102a56,#164e63);
                            padding:30px;border-radius:18px;color:white;
                            box-shadow:0 10px 25px rgba(16,42,86,.12);">
                    <div style="font-size:12px;font-weight:700;letter-spacing:2px;
                                color:#99f6e4;margin-bottom:8px;">
                        SUARAWARGA
                    </div>
                    <h1 style="font-size:30px;font-weight:800;line-height:1.3;margin:0 0 10px;">
                        Buat Pengaduan
                    </h1>
                    <p style="font-size:14px;color:#e2e8f0;margin:0;">
                        Sampaikan keluhan atau laporan Anda agar dapat ditindaklanjuti.
                    </p>
                </div>
            </div>

            {{-- PESAN VALIDASI --}}
            @if ($errors->any())
                <div style="background:#fef2f2;border:1px solid #fecaca;
                            color:#991b1b;padding:16px;border-radius:12px;
                            margin-bottom:22px;">
                    <strong>Periksa kembali formulir Anda:</strong>
                    <ul style="padding-left:20px;margin-top:8px;list-style:disc;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- PESAN SUKSES --}}
            @if (session('success'))
                <div style="background:#dcfce7;border:1px solid #86efac;
                            color:#166534;padding:15px;border-radius:12px;margin-bottom:20px;">
                    {{ session('success') }}
                </div>
            @endif

            {{-- FORM PENGADUAN --}}
            <form action="{{ route('pengaduan.store') }}" method="POST"
                  style="background:white;padding:30px;border-radius:18px;
                         border:1px solid #e2e8f0;
                         box-shadow:0 8px 25px rgba(15,23,42,.05);">
                @csrf

                {{-- JUDUL --}}
                <div style="margin-bottom:24px;">
                    <label for="judul"
                           style="display:block;font-size:14px;font-weight:700;
                                  color:#1e293b;margin-bottom:8px;">
                        Judul Pengaduan <span style="color:#dc2626;">*</span>
                    </label>

                    <input id="judul" name="judul" type="text"
                           value="{{ old('judul') }}" maxlength="255" required
                           placeholder="Contoh: Lampu jalan mati"
                           style="width:100%;padding:13px 15px;border:1px solid #cbd5e1;
                                  border-radius:10px;font-size:14px;color:#0f172a;">

                    @error('judul')
                        <p style="color:#dc2626;font-size:13px;margin-top:6px;">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- LOKASI --}}
                <div style="margin-bottom:24px;">
                    <label for="lokasi"
                           style="display:block;font-size:14px;font-weight:700;
                                  color:#1e293b;margin-bottom:8px;">
                        Lokasi Pengaduan <span style="color:#dc2626;">*</span>
                    </label>

                    <input id="lokasi" name="lokasi" type="text"
                           value="{{ old('lokasi') }}" maxlength="255" required
                           placeholder="Contoh: Jalan Merdeka, Desa ..., Kecamatan ..."
                           style="width:100%;padding:13px 15px;border:1px solid #cbd5e1;
                                  border-radius:10px;font-size:14px;color:#0f172a;">

                    @error('lokasi')
                        <p style="color:#dc2626;font-size:13px;margin-top:6px;">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- ISI PENGADUAN --}}
                <div style="margin-bottom:28px;">
                    <label for="isi_pengaduan"
                           style="display:block;font-size:14px;font-weight:700;
                                  color:#1e293b;margin-bottom:8px;">
                        Isi Pengaduan <span style="color:#dc2626;">*</span>
                    </label>

                    <textarea id="isi_pengaduan" name="isi_pengaduan"
                              rows="7" required
                              placeholder="Jelaskan masalah yang terjadi secara rinci..."
                              style="width:100%;padding:14px 15px;border:1px solid #cbd5e1;
                                     border-radius:10px;font-size:14px;color:#0f172a;
                                     resize:vertical;">{{ old('isi_pengaduan') }}</textarea>

                    <p style="font-size:12px;color:#64748b;margin-top:7px;">
                        Tuliskan pengaduan secara jelas dan sesuai kondisi sebenarnya.
                    </p>

                    @error('isi_pengaduan')
                        <p style="color:#dc2626;font-size:13px;margin-top:6px;">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- TOMBOL --}}
                <div style="border-top:1px solid #e2e8f0;padding-top:22px;
                            display:flex;flex-wrap:wrap;gap:12px;align-items:center;">

                    <button type="submit"
                            style="display:inline-flex;justify-content:center;
                                   align-items:center;gap:10px;flex:1;min-width:220px;
                                   padding:16px 24px;background:#0d9488;color:#ffffff;
                                   border:2px solid #0d9488;border-radius:11px;
                                   font-size:16px;font-weight:800;cursor:pointer;
                                   box-shadow:0 5px 14px rgba(13,148,136,.28);">
                        <span style="font-size:19px;">✉</span>
                        Kirim Pengaduan
                    </button>

                    <a href="{{ route('pengaduan.index') }}"
                       style="display:inline-flex;justify-content:center;
                              align-items:center;padding:15px 22px;background:#ffffff;
                              color:#475569;border:1px solid #cbd5e1;
                              border-radius:11px;font-size:14px;font-weight:700;
                              text-decoration:none;">
                        Batal
                    </a>
                </div>

                <p style="font-size:12px;color:#64748b;margin-top:16px;">
                    <span style="color:#0d9488;font-weight:800;">●</span>
                    Pastikan judul, lokasi, dan isi pengaduan sudah benar.
                </p>
            </form>

            <p style="text-align:center;color:#94a3b8;font-size:12px;margin-top:24px;">
                © {{ date('Y') }} SuaraWarga · Layanan Pengaduan Masyarakat
            </p>

        </div>
    </div>
</x-app-layout>