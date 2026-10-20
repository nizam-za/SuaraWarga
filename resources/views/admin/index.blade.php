<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | SuaraWarga</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * { box-sizing: border-box; }
        :root {
            --navy: #14263d;
            --navy2: #1d3551;
            --teal: #18b7a0;
            --teal-dark: #0d8f80;
            --bg: #f4f7fb;
            --text: #243449;
            --muted: #8390a3;
            --border: #e8edf3;
            --white: #fff;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: Inter, "Segoe UI", Arial, sans-serif;
            font-size: 14px;
        }

        a { color: inherit; text-decoration: none; }
        button, input, select { font: inherit; }

        .layout { display: flex; min-height: 100vh; }

        .sidebar {
            width: 258px;
            flex: 0 0 258px;
            min-height: 100vh;
            padding: 26px 17px 18px;
            display: flex;
            flex-direction: column;
            background: var(--navy);
            color: white;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 9px 27px;
            border-bottom: 1px solid #ffffff16;
        }

        .brand-icon {
            width: 44px;
            height: 44px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 14px;
            background: var(--teal);
            color: #083d3b;
            font-size: 24px;
            font-weight: 900;
        }

        .brand-name { font-size: 19px; font-weight: 800; }
        .brand-sub {
            margin-top: 5px;
            color: #9eb0c5;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 1.4px;
        }

        .nav-label {
            padding: 26px 12px 11px;
            color: #8195ae;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.5px;
        }

        .nav-menu { display: grid; gap: 6px; }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            min-height: 47px;
            padding: 12px 14px;
            border: 1px solid transparent;
            border-radius: 11px;
            color: #bdc9d8;
            font-size: 13px;
            font-weight: 600;
            transition: .2s;
        }

        .nav-link:hover { background: #ffffff0b; color: white; }
        .nav-link.active {
            border-color: #ffffff0d;
            background: linear-gradient(100deg, #18b7a026, #18b7a00a);
            color: white;
            box-shadow: inset 3px 0 var(--teal);
        }

        .nav-icon { width: 23px; flex: 0 0 23px; text-align: center; font-size: 18px; }
        .sidebar-bottom { margin-top: auto; padding-top: 22px; border-top: 1px solid #ffffff16; }

        .user-box {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 12px;
            border: 1px solid #ffffff0c;
            border-radius: 13px;
            background: #ffffff08;
        }

        .avatar, .person-avatar {
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 11px;
            background: #d8f8f0;
            color: #087d70;
            font-weight: 800;
        }

        .avatar { width: 39px; height: 39px; }
        .user-name { overflow-wrap: anywhere; color: white; font-size: 12px; font-weight: 700; }
        .user-role { margin-top: 5px; color: #9aadc2; font-size: 11px; }

        .logout-button {
            width: 100%;
            margin-top: 10px;
            padding: 12px;
            border: 0;
            border-radius: 10px;
            background: transparent;
            color: #c4cfde;
            text-align: left;
            cursor: pointer;
        }

        .logout-button:hover { background: #ffffff0c; color: white; }

        .main { min-width: 0; flex: 1; padding: 32px 36px; }
        .main-inner { width: 100%; max-width: 1550px; margin: 0 auto; }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 29px;
        }

        .eyebrow {
            margin-bottom: 8px;
            color: var(--teal-dark);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.6px;
        }

        .page-title {
            margin: 0;
            color: var(--navy);
            font-size: 29px;
            font-weight: 800;
            letter-spacing: -.9px;
        }

        .subtitle { margin-top: 9px; color: var(--muted); font-size: 13px; line-height: 1.7; }

        .date-pill {
            padding: 12px 15px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: white;
            color: #5f6f83;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .flash {
            margin-bottom: 22px;
            padding: 14px 17px;
            border: 1px solid #b7edcf;
            border-radius: 12px;
            background: #effcf4;
            color: #166534;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 23px;
        }

        .stat-card {
            position: relative;
            min-width: 0;
            overflow: hidden;
            padding: 22px;
            border: 1px solid var(--border);
            border-radius: 17px;
            background: white;
            box-shadow: 0 5px 18px #14263d06;
            transition: transform .2s, box-shadow .2s;
        }

        .stat-card:hover { transform: translateY(-3px); box-shadow: 0 12px 25px #14263d0d; }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
        }

        .stat-label { color: #738198; font-size: 12px; font-weight: 700; line-height: 1.5; }

        .stat-icon {
            width: 43px;
            height: 43px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 13px;
            background: var(--soft);
            color: var(--accent);
            font-size: 21px;
        }

        .stat-number {
            margin-top: 19px;
            color: var(--navy);
            font-size: 34px;
            font-weight: 850;
            letter-spacing: -1.3px;
        }

        .stat-note { margin-top: 9px; color: #96a1b0; font-size: 11px; line-height: 1.5; }
        .stat-total { --accent: #4778db; --soft: #eaf1ff; }
        .stat-wait { --accent: #d99523; --soft: #fff3dd; }
        .stat-process { --accent: #8560d4; --soft: #f0eaff; }
        .stat-done { --accent: #129778; --soft: #ddf7ee; }
        .stat-data { --accent: #0d8f80; --soft: #ddf7ee; }

        .middle {
            display: grid;
            grid-template-columns: minmax(0, 1.25fr) minmax(290px, .85fr);
            gap: 20px;
            margin-bottom: 23px;
        }

        .panel {
            min-width: 0;
            padding: 24px;
            border: 1px solid var(--border);
            border-radius: 17px;
            background: white;
            box-shadow: 0 5px 18px #14263d05;
        }

        .panel-heading { color: var(--navy); font-size: 15px; font-weight: 800; line-height: 1.5; }
        .panel-desc { margin-top: 6px; color: #919daf; font-size: 11px; line-height: 1.7; }

        .chart {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 22px;
            height: 205px;
            margin-top: 20px;
            padding: 12px 12px 0;
            border-bottom: 1px solid var(--border);
            background: repeating-linear-gradient(to bottom, transparent 0, transparent 49px, #eef2f7 50px);
        }

        .chart-col { display: grid; grid-template-rows: 20px minmax(0, 1fr) 34px; min-width: 0; text-align: center; }
        .chart-value { color: #58687d; font-size: 12px; font-weight: 800; }
        .bar-area { display: flex; align-items: flex-end; justify-content: center; min-height: 0; }

        .chart-bar {
            width: min(54px, 65%);
            border-radius: 9px 9px 2px 2px;
            transition: height .3s;
        }

        .chart-label { padding-top: 10px; color: #748198; font-size: 11px; font-weight: 600; }
        .legend { display: flex; flex-wrap: wrap; gap: 18px; margin-top: 18px; }
        .legend-item { display: flex; align-items: center; gap: 7px; color: #718096; font-size: 11px; }
        .dot { width: 9px; height: 9px; flex-shrink: 0; border-radius: 50%; }

        .progress-item { margin-top: 26px; }
        .progress-head { display: flex; justify-content: space-between; gap: 10px; margin-bottom: 11px; font-size: 12px; }
        .progress-name { display: flex; align-items: center; gap: 8px; color: #68778b; font-weight: 600; }
        .progress-count { color: var(--navy); font-weight: 800; }
        .progress-track { height: 9px; overflow: hidden; border-radius: 20px; background: #edf1f6; }
        .progress-fill { height: 100%; border-radius: 20px; }
        .progress-foot { display: flex; justify-content: space-between; gap: 8px; margin-top: 7px; color: #a0aaba; font-size: 10px; }

        .table-panel { padding: 0; overflow: hidden; }
        .table-header { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 17px; padding: 24px; }
        .table-title-row { display: flex; align-items: center; flex-wrap: wrap; gap: 10px; }

        .table-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 27px;
            height: 25px;
            padding: 0 7px;
            border-radius: 8px;
            background: #e5f8f4;
            color: #087f70;
            font-size: 11px;
            font-weight: 800;
        }

        .filter-form {
            display: grid;
            grid-template-columns: minmax(180px, 1.5fr) minmax(130px, 1fr) minmax(150px, 1fr) auto auto;
            gap: 9px;
            padding: 0 24px 20px;
        }

        .field {
            width: 100%;
            min-width: 0;
            padding: 11px 12px;
            border: 1px solid #e1e7ef;
            border-radius: 10px;
            outline: none;
            background: white;
            color: var(--text);
            font-size: 12px;
        }

        .field:focus { border-color: var(--teal); box-shadow: 0 0 0 3px #18b7a01b; }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 11px 14px;
            border: 1px solid transparent;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 800;
            cursor: pointer;
            white-space: nowrap;
        }

        .btn-primary { background: var(--teal); color: #073c37; }
        .btn-primary:hover { background: #12a993; }
        .btn-light { border-color: #e1e7ef; background: white; color: #64748b; }
        .btn-light:hover { background: #f7f9fc; }

        .table-scroll { overflow-x: auto; }

        table { width: 100%; border-collapse: collapse; text-align: left; }
        thead { background: #f7f9fc; }

        th {
            padding: 15px 18px;
            border-top: 1px solid #eef1f5;
            border-bottom: 1px solid #e9eef4;
            color: #8793a5;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .7px;
            text-transform: uppercase;
            white-space: nowrap;
        }

        td { padding: 16px 18px; border-bottom: 1px solid #edf1f6; font-size: 12px; vertical-align: middle; }
        tbody tr:last-child td { border-bottom: 0; }
        tbody tr:hover { background: #fbfefd; }

        .person { display: flex; align-items: center; gap: 10px; min-width: 135px; }
        .person-avatar { width: 36px; height: 36px; background: #e9f1ff; color: #416ec1; font-size: 12px; }
        .person-name { max-width: 160px; color: #35445a; font-weight: 700; overflow-wrap: anywhere; }
        .report-title { max-width: 260px; color: #29384d; font-weight: 750; line-height: 1.6; }
        .report-desc { max-width: 290px; margin-top: 4px; color: #8b97a8; font-size: 11px; line-height: 1.6; }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 10px;
            border-radius: 8px;
            font-size: 10px;
            font-weight: 800;
            white-space: nowrap;
        }

        .status-wait { background: #fff3dd; color: #a66b0c; }
        .status-process { background: #e8efff; color: #3b68c5; }
        .status-done { background: #ddf7ed; color: #128261; }
        .category { background: #f0eaff; color: #8055bf; }

        .detail-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 10px 12px;
            border: 1px solid #ccefe8;
            border-radius: 9px;
            background: #e9f8f5;
            color: #087f70;
            font-size: 11px;
            font-weight: 800;
            white-space: nowrap;
        }

        .detail-btn:hover { border-color: var(--teal); background: #d6f4ed; }
        .empty-state { padding: 40px 20px; color: #8b97a8; font-size: 13px; text-align: center; }

        .pagination-wrap {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 15px;
            padding: 18px 24px;
            border-top: 1px solid var(--border);
        }

        .pagination-info { color: #8793a5; font-size: 11px; }

        .pagination {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 6px;
        }

        .pagination a, .pagination span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 34px;
            height: 34px;
            padding: 0 10px;
            border: 1px solid #e1e7ef;
            border-radius: 8px;
            background: white;
            color: #64748b;
            font-size: 12px;
        }

        .pagination .current { border-color: var(--teal); background: var(--teal); color: #073c37; font-weight: 800; }
        .pagination .disabled { opacity: .45; }
        .footer { padding: 24px 0 0; color: #a0aaba; font-size: 11px; text-align: center; }

        @media (max-width: 1200px) {
            .sidebar { width: 235px; flex-basis: 235px; }
            .main { padding: 27px 23px; }
            .stats { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .middle { grid-template-columns: 1fr; }
            .filter-form { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }

        @media (max-width: 760px) {
            .layout { display: block; }
            .sidebar { width: 100%; min-height: auto; padding: 15px; }
            .brand { padding: 0 5px 15px; }
            .sidebar .nav-label, .sidebar-bottom { display: none; }
            .nav-menu { display: flex; gap: 5px; overflow-x: auto; padding-top: 12px; }
            .nav-link { flex: 0 0 auto; min-height: 39px; padding: 10px 12px; font-size: 11px; white-space: nowrap; }
            .nav-icon { display: none; }
            .main { padding: 23px 15px; }
            .topbar { align-items: flex-start; }
            .page-title { font-size: 25px; }
            .date-pill { display: none; }
            .panel { padding: 18px; }
            .table-header { padding: 18px; }
            .filter-form { padding: 0 18px 18px; }
            .chart { gap: 10px; padding-right: 3px; padding-left: 3px; }
            .pagination-wrap { padding: 16px 18px; }
        }

        @media (max-width: 480px) {
            .stats { grid-template-columns: 1fr; }
            .stat-card { padding: 19px; }
            .main { padding: 20px 12px; }
            .page-title { font-size: 23px; }
            .panel { padding: 15px; }
            .table-header { padding: 15px; }
            .filter-form { grid-template-columns: 1fr; padding: 0 15px 15px; }
            .chart { gap: 4px; }
            .legend { gap: 10px; }
            .pagination-wrap { padding: 15px; }
        }
    </style>
</head>

<body>
@php
    $total = (int) ($totalPengaduan ?? 0);
    $waiting = (int) ($menunggu ?? 0);
    $processing = (int) ($diproses ?? 0);
    $completed = (int) ($selesai ?? 0);
    $totalLatih = (int) ($totalDataLatih ?? 0);
    $jumlahKategoriData = (int) ($jumlahKategori ?? 0);

    $maxStatus = max($waiting, $processing, $completed, 1);

    $waitingPercent = $total > 0 ? round($waiting / $total * 100) : 0;
    $processingPercent = $total > 0 ? round($processing / $total * 100) : 0;
    $completedPercent = $total > 0 ? round($completed / $total * 100) : 0;

    $statusTerpilih = request('status', '');
    $kategoriTerpilih = request('kategori', '');
    $cariTerpilih = request('cari', '');
@endphp

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
            <a href="{{ route('admin.index') }}" class="nav-link active">
                <span class="nav-icon">▦</span> Dashboard
            </a>
            <a href="{{ route('admin.index') }}" class="nav-link">
                <span class="nav-icon">▤</span> Data Pengaduan
            </a>
            <a href="{{ route('admin.data-latih.index') }}" class="nav-link">
                <span class="nav-icon">◈</span> Data Latih
            </a>
            <a href="{{ url('/') }}" class="nav-link">
                <span class="nav-icon">⌂</span> Halaman Publik
            </a>
        </nav>

        <div class="sidebar-bottom">
            <div class="nav-label" style="padding-top:0">AKUN</div>
            <div class="user-box">
                <div class="avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>
                <div>
                    <div class="user-name">{{ auth()->user()->name ?? 'Administrator' }}</div>
                    <div class="user-role">Administrator</div>
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-button">
                    <span class="nav-icon">↪</span> Keluar dari akun
                </button>
            </form>
        </div>
    </aside>

    <main class="main">
        <div class="main-inner">
            <header class="topbar">
                <div>
                    <div class="eyebrow">SUARAWARGA / ADMINISTRASI</div>
                    <h1 class="page-title">Dashboard Admin</h1>
                    <div class="subtitle">
                        Pantau dan tindak lanjuti laporan masyarakat dalam satu tempat.
                    </div>
                </div>
                <div class="date-pill">▦ &nbsp; {{ now()->translatedFormat('d F Y') }}</div>
            </header>

            @if (session('success'))
                <div class="flash">✓ &nbsp; {{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="flash" style="border-color:#fecaca;background:#fef2f2;color:#991b1b">
                    {{ $errors->first() }}
                </div>
            @endif

            <section class="stats">
                <div class="stat-card stat-total">
                    <div class="stat-top">
                        <div class="stat-label">Total Pengaduan</div>
                        <div class="stat-icon">▤</div>
                    </div>
                    <div class="stat-number">{{ number_format($total) }}</div>
                    <div class="stat-note">Seluruh laporan yang masuk</div>
                </div>

                <div class="stat-card stat-wait">
                    <div class="stat-top">
                        <div class="stat-label">Menunggu</div>
                        <div class="stat-icon">◷</div>
                    </div>
                    <div class="stat-number">{{ number_format($waiting) }}</div>
                    <div class="stat-note">Menunggu tindak lanjut</div>
                </div>

                <div class="stat-card stat-process">
                    <div class="stat-top">
                        <div class="stat-label">Sedang Diproses</div>
                        <div class="stat-icon">⟳</div>
                    </div>
                    <div class="stat-number">{{ number_format($processing) }}</div>
                    <div class="stat-note">Laporan dalam penanganan</div>
                </div>

                <div class="stat-card stat-done">
                    <div class="stat-top">
                        <div class="stat-label">Selesai</div>
                        <div class="stat-icon">✓</div>
                    </div>
                    <div class="stat-number">{{ number_format($completed) }}</div>
                    <div class="stat-note">Laporan telah ditangani</div>
                </div>

                <div class="stat-card stat-data">
                    <div class="stat-top">
                        <div class="stat-label">Data Latih</div>
                        <div class="stat-icon">◈</div>
                    </div>
                    <div class="stat-number">{{ number_format($totalLatih) }}</div>
                    <div class="stat-note">Data untuk klasifikasi Naive Bayes</div>
                </div>

                <div class="stat-card stat-data">
                    <div class="stat-top">
                        <div class="stat-label">Kategori Data Latih</div>
                        <div class="stat-icon">⌘</div>
                    </div>
                    <div class="stat-number">{{ number_format($jumlahKategoriData) }}</div>
                    <div class="stat-note">Kategori dalam dataset pelatihan</div>
                </div>
            </section>

            <section class="middle">
                <div class="panel">
                    <div class="panel-heading">Ringkasan Status Pengaduan</div>
                    <div class="panel-desc">Perbandingan jumlah laporan berdasarkan status terkini.</div>

                    <div class="chart">
                        <div class="chart-col">
                            <div class="chart-value">{{ $waiting }}</div>
                            <div class="bar-area">
                                <div class="chart-bar"
                                     style="height:{{ $waiting > 0 ? max(5, round($waiting / $maxStatus * 100)) : 0 }}%;background:#f3b64e"></div>
                            </div>
                            <div class="chart-label">Menunggu</div>
                        </div>

                        <div class="chart-col">
                            <div class="chart-value">{{ $processing }}</div>
                            <div class="bar-area">
                                <div class="chart-bar"
                                     style="height:{{ $processing > 0 ? max(5, round($processing / $maxStatus * 100)) : 0 }}%;background:#8b6de0"></div>
                            </div>
                            <div class="chart-label">Diproses</div>
                        </div>

                        <div class="chart-col">
                            <div class="chart-value">{{ $completed }}</div>
                            <div class="bar-area">
                                <div class="chart-bar"
                                     style="height:{{ $completed > 0 ? max(5, round($completed / $maxStatus * 100)) : 0 }}%;background:#18b7a0"></div>
                            </div>
                            <div class="chart-label">Selesai</div>
                        </div>
                    </div>

                    <div class="legend">
                        <div class="legend-item"><span class="dot" style="background:#f3b64e"></span>Menunggu</div>
                        <div class="legend-item"><span class="dot" style="background:#8b6de0"></span>Diproses</div>
                        <div class="legend-item"><span class="dot" style="background:#18b7a0"></span>Selesai</div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-heading">Progres Penanganan</div>
                    <div class="panel-desc">Persentase setiap status dibandingkan seluruh laporan.</div>

                    <div class="progress-item">
                        <div class="progress-head">
                            <span class="progress-name"><span class="dot" style="background:#f3b64e"></span>Menunggu</span>
                            <span class="progress-count">{{ $waitingPercent }}%</span>
                        </div>
                        <div class="progress-track">
                            <div class="progress-fill" style="width:{{ $waitingPercent }}%;background:#f3b64e"></div>
                        </div>
                        <div class="progress-foot"><span>{{ $waiting }} laporan</span><span>Menunggu tindak lanjut</span></div>
                    </div>

                    <div class="progress-item">
                        <div class="progress-head">
                            <span class="progress-name"><span class="dot" style="background:#8b6de0"></span>Sedang diproses</span>
                            <span class="progress-count">{{ $processingPercent }}%</span>
                        </div>
                        <div class="progress-track">
                            <div class="progress-fill" style="width:{{ $processingPercent }}%;background:#8b6de0"></div>
                        </div>
                        <div class="progress-foot"><span>{{ $processing }} laporan</span><span>Dalam penanganan</span></div>
                    </div>

                    <div class="progress-item">
                        <div class="progress-head">
                            <span class="progress-name"><span class="dot" style="background:#18b7a0"></span>Selesai</span>
                            <span class="progress-count">{{ $completedPercent }}%</span>
                        </div>
                        <div class="progress-track">
                            <div class="progress-fill" style="width:{{ $completedPercent }}%;background:#18b7a0"></div>
                        </div>
                        <div class="progress-foot"><span>{{ $completed }} laporan</span><span>Sudah ditangani</span></div>
                    </div>
                </div>
            </section>

            <section class="panel table-panel">
                <div class="table-header">
                    <div>
                        <div class="table-title-row">
                            <div class="panel-heading">Daftar Pengaduan Masyarakat</div>
                            <span class="table-count">{{ $jumlahHasil ?? $pengaduans->total() }}</span>
                        </div>
                        <div class="panel-desc">Cari, saring, dan buka detail laporan untuk tindak lanjut.</div>
                    </div>
                </div>

                <form method="GET" action="{{ route('admin.index') }}" class="filter-form">
                    <input
                        class="field"
                        type="search"
                        name="cari"
                        value="{{ $cariTerpilih }}"
                        placeholder="Cari judul, isi, lokasi, pelapor..."
                        aria-label="Cari pengaduan">

                    <select class="field" name="status" aria-label="Filter status">
                        <option value="">Semua status</option>
                        <option value="menunggu" @selected($statusTerpilih === 'menunggu')>Menunggu</option>
                        <option value="diproses" @selected($statusTerpilih === 'diproses')>Diproses</option>
                        <option value="selesai" @selected($statusTerpilih === 'selesai')>Selesai</option>
                    </select>

                    <select class="field" name="kategori" aria-label="Filter kategori">
                        <option value="">Semua kategori</option>
                        @foreach ($kategoriList as $kategoriPilihan)
                            <option value="{{ $kategoriPilihan }}" @selected($kategoriTerpilih === $kategoriPilihan)>
                                {{ $kategoriPilihan }}
                            </option>
                        @endforeach
                    </select>

                    <button class="btn btn-primary" type="submit">⌕ Cari / Filter</button>
                    <a class="btn btn-light" href="{{ route('admin.index') }}">Reset</a>
                </form>

                <div class="table-scroll">
                    <table>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Pelapor</th>
                                <th>Informasi Pengaduan</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($pengaduans as $index => $pengaduan)
                                @php
                                    $judul = $pengaduan->judul ?? 'Pengaduan tanpa judul';
                                    $isi = $pengaduan->isi_pengaduan ?? '';
                                    $kategori = $pengaduan->kategori ?: 'Belum dikategorikan';
                                    $status = strtolower($pengaduan->status ?? 'menunggu');
                                    $namaPelapor = $pengaduan->user->name ?? 'Pengguna';

                                    $statusClass = match ($status) {
                                        'diproses' => 'status-process',
                                        'selesai' => 'status-done',
                                        default => 'status-wait',
                                    };
                                @endphp

                                <tr>
                                    <td style="color:#97a2b2">
                                        {{ $pengaduans->firstItem() + $index }}
                                    </td>
                                    <td>
                                        <div class="person">
                                            <div class="person-avatar">
                                                {{ strtoupper(substr($namaPelapor, 0, 1)) }}
                                            </div>
                                            <div class="person-name">{{ $namaPelapor }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="report-title">{{ $judul }}</div>
                                        <div class="report-desc">
                                            {{ \Illuminate\Support\Str::limit($isi, 85) }}
                                        </div>
                                    </td>
                                    <td><span class="badge category">{{ $kategori }}</span></td>
                                    <td>
                                        <span class="badge {{ $statusClass }}">
                                            ● {{ ucfirst($status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a class="detail-btn"
                                           href="{{ route('admin.pengaduan.show', $pengaduan) }}">
                                            Lihat Detail ↗
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="empty-state">
                                            Tidak ada pengaduan yang cocok dengan pencarian atau filter.
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($pengaduans->hasPages())
                    <div class="pagination-wrap">
                        <div class="pagination-info">
                            Menampilkan {{ $pengaduans->firstItem() }}–{{ $pengaduans->lastItem() }}
                            dari {{ $pengaduans->total() }} pengaduan
                        </div>

                        <nav class="pagination" aria-label="Navigasi halaman">
                            @if ($pengaduans->onFirstPage())
                                <span class="disabled">‹</span>
                            @else
                                <a href="{{ $pengaduans->previousPageUrl() }}" aria-label="Halaman sebelumnya">‹</a>
                            @endif

                            @foreach ($pengaduans->getUrlRange(1, $pengaduans->lastPage()) as $page => $url)
                                @if ($page === $pengaduans->currentPage())
                                    <span class="current" aria-current="page">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}">{{ $page }}</a>
                                @endif
                            @endforeach

                            @if ($pengaduans->hasMorePages())
                                <a href="{{ $pengaduans->nextPageUrl() }}" aria-label="Halaman berikutnya">›</a>
                            @else
                                <span class="disabled">›</span>
                            @endif
                        </nav>
                    </div>
                @endif
            </section>

            <footer class="footer">
                SuaraWarga · Sistem Informasi Pengaduan Masyarakat
            </footer>
        </div>
    </main>
</div>
</body>
</html>