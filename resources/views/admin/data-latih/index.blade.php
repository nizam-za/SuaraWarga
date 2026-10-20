<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Latih | SuaraWarga</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        *{box-sizing:border-box}
        body{margin:0;background:#f4f7fb;color:#17243b}
        .layout{display:flex;min-height:100vh}
        .sidebar{width:245px;flex-shrink:0;background:#17243b;color:white;padding:28px 17px;display:flex;flex-direction:column}
        .brand{display:flex;align-items:center;gap:11px;padding:0 9px 30px}
        .brand-icon{width:42px;height:42px;border-radius:13px;background:#14b8a6;display:grid;place-items:center;font-size:23px;font-weight:800;color:#102b3a}
        .brand-name{font-size:19px;font-weight:800}
        .brand-sub{color:#9aabc1;font-size:11px;margin-top:3px}
        .nav-label{color:#7e90a9;font-size:10px;font-weight:800;letter-spacing:1.5px;padding:12px}
        .nav-link{display:flex;align-items:center;gap:12px;text-decoration:none;color:#c2cede;padding:13px 14px;border-radius:11px;font-size:13px;font-weight:600;margin-bottom:5px}
        .nav-link:hover,.nav-link.active{background:#263a56;color:white}
        .nav-link.active{box-shadow:inset 3px 0 #14b8a6}
        .nav-icon{width:20px;text-align:center;font-size:17px}
        .sidebar-bottom{margin-top:auto;padding-top:25px}
        .user-box{background:#22344e;border-radius:13px;padding:13px;display:flex;gap:10px;align-items:center}
        .avatar{width:37px;height:37px;display:grid;place-items:center;border-radius:12px;background:#d6f5ef;color:#087f70;font-weight:800}
        .user-name{font-size:12px;font-weight:700}.user-role{color:#9aabc1;font-size:11px;margin-top:3px}
        .main{min-width:0;flex:1;padding:30px 34px}
        .topbar{display:flex;justify-content:space-between;align-items:center;gap:16px;margin-bottom:27px}
        .eyebrow{color:#0e9f91;text-transform:uppercase;letter-spacing:1.6px;font-weight:800;font-size:10px;margin-bottom:7px}
        .page-title{font-size:27px;line-height:1.25;font-weight:800;letter-spacing:-.7px}
        .subtitle{color:#8290a4;font-size:13px;margin-top:7px}
        .date-pill{background:white;border:1px solid #e5eaf1;border-radius:11px;padding:11px 14px;color:#536176;font-size:12px;white-space:nowrap}
        .button-primary{display:inline-flex;align-items:center;justify-content:center;gap:8px;background:#0d9f90;color:white;padding:12px 17px;border-radius:11px;text-decoration:none;font-size:12px;font-weight:800;box-shadow:0 4px 12px #0d9f901f}
        .button-primary:hover{background:#087f73}
        .stats{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:16px;margin-bottom:22px}
        .stat-card{background:white;border:1px solid #e9eef5;border-radius:16px;padding:20px;position:relative;overflow:hidden}
        .stat-top{display:flex;justify-content:space-between;align-items:center;gap:8px}
        .stat-label{color:#78869a;font-size:12px;font-weight:600}
        .stat-icon{width:40px;height:40px;border-radius:12px;display:grid;place-items:center;font-size:19px}
        .stat-number{font-size:30px;font-weight:800;letter-spacing:-1px;margin-top:14px;line-height:1.1}
        .stat-note{color:#95a0b1;font-size:11px;margin-top:8px}
        .blue{background:#e9f1ff;color:#3d72d9}.teal{background:#ddf7ef;color:#119779}.purple{background:#f1eaff;color:#8758d5}
        .panel{background:white;border:1px solid #e9eef5;border-radius:17px;overflow:hidden}
        .panel-head{padding:22px 23px;display:flex;justify-content:space-between;align-items:center;gap:15px;flex-wrap:wrap;border-bottom:1px solid #edf1f6}
        .panel-title{font-size:15px;font-weight:800}
        .panel-desc{font-size:11px;color:#95a0b1;margin-top:5px}
        .search-wrap{position:relative}
        .search-input{width:270px;max-width:100%;padding:11px 13px 11px 37px;border:1px solid #e1e7ef;border-radius:10px;outline:none;font-size:12px;background:#fff}
        .search-input:focus{border-color:#14b8a6;box-shadow:0 0 0 3px #14b8a61c}
        .search-symbol{position:absolute;left:13px;top:9px;color:#8995a7}
        .table-scroll{overflow-x:auto}
        table{width:100%;border-collapse:collapse;text-align:left}
        thead{background:#f8fafc}
        th{color:#8793a5;font-size:10px;text-transform:uppercase;letter-spacing:.8px;font-weight:800;padding:15px 20px;white-space:nowrap}
        td{padding:16px 20px;border-top:1px solid #edf1f6;font-size:12px;vertical-align:middle}
        tbody tr:hover{background:#fbfdff}
        .row-number{color:#97a2b2}
        .text-cell{min-width:250px;max-width:440px;color:#46556b;line-height:1.7;font-size:12px}
        .category{display:inline-flex;border-radius:20px;padding:7px 11px;font-size:10px;font-weight:800;white-space:nowrap}
        .cat-blue{background:#e9f1ff;color:#315eb6}.cat-green{background:#ddf7ed;color:#128261}
        .cat-orange{background:#fff1d7;color:#a66b0c}.cat-purple{background:#f1eaff;color:#8055bf}
        .cat-default{background:#edf1f6;color:#59677c}
        .date-text{white-space:nowrap;color:#78869a}
        .action-edit,.action-delete{display:inline-flex;align-items:center;justify-content:center;border-radius:9px;padding:8px 11px;font-size:11px;font-weight:800;white-space:nowrap;cursor:pointer}
        .action-edit{border:1px solid #f4d28b;background:#fff8e8;color:#a66b0c;text-decoration:none}
        .action-edit:hover{background:#fff0ca}
        .action-delete{border:1px solid #fecaca;background:#fff1f2;color:#be3344}
        .action-delete:hover{background:#ffe0e3}
        .actions{display:flex;align-items:center;justify-content:center;gap:7px}
        .flash{padding:13px 16px;border-radius:11px;background:#dcfce7;color:#166534;font-size:13px;margin-bottom:20px}
        .error-box{padding:13px 16px;border-radius:11px;background:#fff1f2;color:#be123c;font-size:13px;margin-bottom:20px}
        .empty-state{text-align:center;padding:48px 20px;color:#8b97a8;font-size:13px}
        .info-box{margin-top:20px;border:1px solid #dce8fa;background:#edf5ff;border-radius:14px;padding:18px 20px}
        .info-title{font-size:13px;font-weight:800;color:#244b85}
        .info-text{font-size:12px;line-height:1.8;color:#45658f;margin-top:6px}
        .pagination{padding:17px 22px;border-top:1px solid #edf1f6}
        .footer{text-align:center;color:#a0aabc;font-size:11px;padding:23px 0 0}
        @media(max-width:1100px){.main{padding:25px 22px}.stats{grid-template-columns:repeat(2,minmax(0,1fr))}}
        @media(max-width:700px){
            .layout{display:block}.sidebar{width:100%;padding:15px}
            .brand{padding:0 5px 13px}.nav-label,.sidebar-bottom{display:none}
            .nav-menu{display:flex;gap:6px;overflow-x:auto}
            .nav-link{flex-shrink:0;margin:0;padding:10px 12px;font-size:11px}
            .nav-icon{display:none}.main{padding:22px 14px}
            .page-title{font-size:23px}.date-pill{display:none}
            .topbar{align-items:flex-start}.stats{gap:10px}
            .stat-card{padding:14px}.stat-number{font-size:25px}
            .stat-label{font-size:11px}.stat-icon{width:32px;height:32px;font-size:15px}
            .panel-head{padding:17px}.search-wrap,.search-input{width:100%}
        }
    </style>
</head>
<body>
<div class="layout">
    <aside class="sidebar">
        <div class="brand">
            <div class="brand-icon">S</div>
            <div>
                <div class="brand-name">SuaraWarga</div>
                <div class="brand-sub">PORTAL PENGADUAN</div>
            </div>
        </div>

        <div class="nav-label">MENU UTAMA</div>
        <nav class="nav-menu">
            <a href="{{ route('admin.index') }}" class="nav-link"><span class="nav-icon">▦</span>Dashboard</a>
            <a href="{{ route('admin.index') }}" class="nav-link"><span class="nav-icon">▤</span>Data Pengaduan</a>
            <a href="{{ route('admin.data-latih.index') }}" class="nav-link active"><span class="nav-icon">◈</span>Data Latih</a>
            <a href="{{ url('/') }}" class="nav-link"><span class="nav-icon">⌂</span>Halaman Publik</a>
        </nav>

        <div class="sidebar-bottom">
            <div class="nav-label">AKUN</div>
            <div class="user-box">
                <div class="avatar">{{ strtoupper(substr(auth()->user()->name ?? 'A',0,1)) }}</div>
                <div>
                    <div class="user-name">{{ auth()->user()->name ?? 'Administrator' }}</div>
                    <div class="user-role">Administrator</div>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="mt-3">
                @csrf
                <button type="submit" class="nav-link w-full text-left border-0 cursor-pointer" style="background:transparent">
                    <span class="nav-icon">↪</span>Keluar dari akun
                </button>
            </form>
        </div>
    </aside>

    <main class="main">
        <header class="topbar">
            <div>
                <div class="eyebrow">SUARAWARGA / PENGELOLAAN DATA</div>
                <div class="page-title">Manajemen Data Latih</div>
                <div class="subtitle">Kelola data pelatihan untuk membantu klasifikasi pengaduan menggunakan Naive Bayes.</div>
            </div>
            <div class="date-pill">▦ &nbsp; {{ now()->translatedFormat('d F Y') }}</div>
        </header>

        @if(session('success'))
            <div class="flash">✓ &nbsp; {{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="error-box">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @php
            $total = (int) ($totalData ?? 0);
            $kategoriTotal = (int) ($jumlahKategori ?? 0);
            $halamanData = $dataLatih->count();
        @endphp

        <section class="stats">
            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-label">Total Data Latih</div>
                    <div class="stat-icon blue">▤</div>
                </div>
                <div class="stat-number">{{ number_format($total) }}</div>
                <div class="stat-note">Seluruh data yang tersimpan</div>
            </div>
            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-label">Kategori Tersedia</div>
                    <div class="stat-icon purple">◇</div>
                </div>
                <div class="stat-number">{{ number_format($kategoriTotal) }}</div>
                <div class="stat-note">Jenis kategori dalam database</div>
            </div>
            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-label">Data di Halaman Ini</div>
                    <div class="stat-icon teal">✓</div>
                </div>
                <div class="stat-number">{{ number_format($halamanData) }}</div>
                <div class="stat-note">Data yang sedang ditampilkan</div>
            </div>
        </section>

        <section class="panel">
            <div class="panel-head">
                <div>
                    <div class="panel-title">Daftar Data Latih</div>
                    <div class="panel-desc">Cari teks, periksa kategori, atau kelola data yang tersimpan.</div>
                </div>
                <div class="flex flex-wrap items-center gap-3">
                    <div class="search-wrap">
                        <span class="search-symbol">⌕</span>
                        <input id="searchData" type="search" class="search-input" placeholder="Cari teks atau kategori...">
                    </div>
                    <a href="{{ route('admin.data-latih.create') }}" class="button-primary">
                        <span class="text-lg">+</span> Tambah Data
                    </a>
                </div>
            </div>

            @if($dataLatih->count() > 0)
                <div class="table-scroll">
                    <table>
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Teks Pengaduan</th>
                            <th>Kategori</th>
                            <th>Tanggal Ditambahkan</th>
                            <th style="text-align:center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody id="dataLatihBody">
                        @foreach($dataLatih as $item)
                            @php
                                $kategori = strtolower(trim($item->kategori ?? ''));
                                $warnaKategori = match($kategori) {
                                    'infrastruktur' => 'cat-blue',
                                    'kebersihan' => 'cat-green',
                                    'keamanan' => 'cat-orange',
                                    'pelayanan publik' => 'cat-purple',
                                    default => 'cat-default',
                                };
                            @endphp
                            <tr class="data-row">
                                <td class="row-number">{{ $dataLatih->firstItem() + $loop->index }}</td>
                                <td class="text-cell">{{ $item->teks_pengaduan }}</td>
                                <td><span class="category {{ $warnaKategori }}">{{ $item->kategori }}</span></td>
                                <td class="date-text">{{ $item->created_at?->format('d M Y') ?? '-' }}</td>
                                <td>
                                    <div class="actions">
                                        <a href="{{ route('admin.data-latih.edit',$item->id) }}" class="action-edit">✎ Edit</a>
                                        <form action="{{ route('admin.data-latih.destroy',$item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data latih ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-delete">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="noSearchResult" class="empty-state" style="display:none">Tidak ditemukan data yang cocok dengan pencarian.</div>
                <div class="pagination">{{ $dataLatih->links() }}</div>
            @else
                <div class="empty-state">
                    <div style="font-size:44px">▤</div>
                    <h3 class="mt-4 text-lg font-bold text-slate-800">Belum Ada Data Latih</h3>
                    <p class="mx-auto mt-2 max-w-md">Tambahkan contoh pengaduan beserta kategori untuk membantu proses klasifikasi.</p>
                    <a href="{{ route('admin.data-latih.create') }}" class="button-primary mt-5">+ Tambah Data Pertama</a>
                </div>
            @endif
        </section>

        <div class="info-box">
            <div class="info-title">ⓘ &nbsp; Tentang Data Latih Naive Bayes</div>
            <div class="info-text">Pastikan setiap contoh pengaduan memiliki kategori yang tepat. Data yang relevan dan beragam membantu sistem mempelajari pola teks untuk proses klasifikasi.</div>
        </div>

        <footer class="footer">SuaraWarga · Sistem Informasi Pengaduan Masyarakat</footer>
    </main>
</div>

<script>
    const inputCari = document.getElementById('searchData');
    const barisData = document.querySelectorAll('.data-row');
    const pesanKosong = document.getElementById('noSearchResult');

    if (inputCari) {
        inputCari.addEventListener('input', function () {
            const kata = this.value.toLocaleLowerCase('id').trim();
            let jumlahTampil = 0;

            barisData.forEach(function (baris) {
                const cocok = baris.textContent.toLocaleLowerCase('id').includes(kata);
                baris.style.display = cocok ? '' : 'none';
                if (cocok) jumlahTampil++;
            });

            if (pesanKosong) {
                pesanKosong.style.display =
                    barisData.length > 0 && jumlahTampil === 0 ? 'block' : 'none';
            }
        });
    }
</script>
</body>
</html>
