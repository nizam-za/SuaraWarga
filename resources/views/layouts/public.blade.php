<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#102b46">
    <title>@yield('title', 'SuaraWarga') — Pengaduan Masyarakat</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --navy: #102b46;
            --teal: #12a89f;
            --ink: #24384b;
            --muted: #718096;
            --bg: #f5f9fc;
            --line: #e7edf3;
            --white: #fff;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--ink);
            background: var(--white);
            line-height: 1.7;
        }
        a { color: inherit; text-decoration: none; }
        button, a { -webkit-tap-highlight-color: transparent; }
        .container { width: min(1160px, 90%); margin: auto; }

        .navbar {
            position: sticky;
            top: 0;
            z-index: 20;
            background: rgba(255,255,255,.94);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid var(--line);
        }
        .nav-inner {
            min-height: 78px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }
        .brand {
            display: inline-flex;
            align-items: center;
            gap: 11px;
            color: var(--navy);
            font-size: 21px;
            font-weight: 800;
            letter-spacing: -.7px;
            white-space: nowrap;
        }
        .brand-mark {
            width: 43px;
            height: 43px;
            display: grid;
            place-items: center;
            border-radius: 14px;
            color: white;
            font-size: 21px;
            background: linear-gradient(135deg, #176b87, var(--teal));
            box-shadow: 0 8px 20px #12a89f30;
        }
        .nav-links {
            display: flex;
            align-items: center;
            gap: 27px;
            color: #607286;
            font-size: 13px;
            font-weight: 700;
        }
        .nav-links a:not(.btn):hover,
        .nav-links a.active { color: var(--teal); }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 13px 21px;
            border-radius: 11px;
            border: 1px solid transparent;
            font-family: inherit;
            font-size: 13px;
            font-weight: 800;
            cursor: pointer;
            transition: transform .2s, background .2s, box-shadow .2s;
        }
        .btn:hover { transform: translateY(-2px); }
        .btn-primary {
            background: var(--teal);
            color: white;
            box-shadow: 0 9px 23px #12a89f2b;
        }
        .btn-primary:hover { background: #0d928a; }
        .btn-outline {
            background: white;
            color: var(--navy);
            border-color: #dce5ec;
        }
        .btn-outline:hover { background: var(--bg); }
        .btn-white { background: white; color: var(--navy); }
        .btn-white:hover { background: #e8f8f6; }

        .hero {
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(ellipse at 85% 15%, #c9f2eb 0, transparent 32%),
                linear-gradient(125deg, #f0f8fc, #f7fbfc 65%, #e8f8f4);
        }
        .hero::before {
            content: "";
            position: absolute;
            width: 430px;
            height: 430px;
            border: 1px solid #c8e9e5;
            border-radius: 50%;
            right: -190px;
            bottom: -260px;
        }
        .hero-grid {
            position: relative;
            display: grid;
            grid-template-columns: 1.05fr .95fr;
            gap: 65px;
            align-items: center;
            padding-top: 76px;
            padding-bottom: 83px;
        }
        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 8px 13px;
            border: 1px solid #d3eae7;
            border-radius: 30px;
            background: #ffffffc9;
            color: #137d7a;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .7px;
            text-transform: uppercase;
        }
        .dot {
            width: 8px;
            height: 8px;
            background: var(--teal);
            border-radius: 50%;
        }
        h1, h2, h3 { line-height: 1.25; }
        .hero h1 {
            max-width: 640px;
            margin: 24px 0 20px;
            color: var(--navy);
            font-size: clamp(38px, 4.6vw, 60px);
            letter-spacing: -2.6px;
        }
        .accent { color: var(--teal); }
        .lead { color: var(--muted); font-size: 15px; line-height: 1.9; }
        .hero .lead { max-width: 560px; }
        .actions { display: flex; flex-wrap: wrap; gap: 12px; margin-top: 28px; }
        .note { margin-top: 22px; color: #667b8a; font-size: 12px; }

        .visual {
            position: relative;
            padding: 24px 10px;
        }
        .visual-bg {
            position: absolute;
            inset: 8% 3%;
            border-radius: 35px;
            background: linear-gradient(140deg, #b8e8e2, #d8f2ee);
            transform: rotate(5deg);
        }
        .visual-card {
            position: relative;
            padding: 27px;
            border: 1px solid #e8eff2;
            border-radius: 24px;
            background: white;
            box-shadow: 0 30px 75px #16364b20;
        }
        .visual-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            padding-bottom: 19px;
            border-bottom: 1px solid var(--line);
        }
        .visual-top strong { color: var(--navy); font-size: 14px; }
        .pill {
            padding: 5px 9px;
            border-radius: 30px;
            color: #147b68;
            background: #e1f7ef;
            font-size: 9px;
            font-weight: 800;
        }
        .visual-icon {
            display: grid;
            place-items: center;
            width: 54px;
            height: 54px;
            margin: 22px 0 14px;
            border-radius: 16px;
            background: #e9f7f7;
            font-size: 26px;
        }
        .visual-card h3 { color: var(--navy); font-size: 19px; }
        .visual-card p { margin-top: 8px; color: var(--muted); font-size: 12px; }
        .progress-label {
            display: flex;
            justify-content: space-between;
            margin: 22px 0 9px;
            color: var(--muted);
            font-size: 10px;
        }
        .progress { height: 7px; overflow: hidden; border-radius: 20px; background: #edf2f5; }
        .progress span {
            display: block;
            width: 68%;
            height: 100%;
            border-radius: inherit;
            background: linear-gradient(90deg, #176b87, var(--teal));
        }
        .visual-footer {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 21px;
            padding: 14px;
            border-radius: 13px;
            background: #f2faf8;
        }
        .visual-footer strong { display: block; color: var(--navy); font-size: 11px; }
        .visual-footer small { display: block; color: var(--muted); font-size: 10px; }
        .floating {
            position: absolute;
            right: -8px;
            bottom: 0;
            padding: 14px 17px;
            border: 1px solid var(--line);
            border-radius: 14px;
            background: white;
            box-shadow: 0 15px 35px #183e5119;
            color: var(--navy);
            font-size: 11px;
            font-weight: 800;
        }
        .floating span { color: var(--teal); margin-right: 7px; }

        .section { padding: 83px 0; }
        .section-muted { background: var(--bg); }
        .section-head { max-width: 680px; margin: 0 auto 42px; text-align: center; }
        .kicker {
            color: #128f88;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.6px;
            text-transform: uppercase;
        }
        .section-head h2 {
            margin: 12px 0;
            color: var(--navy);
            font-size: clamp(28px, 3.4vw, 39px);
            letter-spacing: -1.4px;
        }
        .section-head p { color: var(--muted); font-size: 14px; }
        .grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 21px; }
        .feature {
            padding: 27px;
            border: 1px solid var(--line);
            border-radius: 18px;
            background: white;
            transition: transform .2s, box-shadow .2s;
        }
        .feature:hover { transform: translateY(-5px); box-shadow: 0 18px 42px #16364b10; }
        .feature-icon {
            display: grid;
            place-items: center;
            width: 53px;
            height: 53px;
            margin-bottom: 20px;
            border-radius: 16px;
            background: #e9f7f6;
            font-size: 24px;
        }
        .feature h3 { margin-bottom: 10px; color: var(--navy); font-size: 17px; }
        .feature p { color: var(--muted); font-size: 13px; line-height: 1.9; }
        .feature-link {
            display: inline-block;
            margin-top: 19px;
            color: #118f89;
            font-size: 12px;
            font-weight: 800;
        }
        .steps { counter-reset: step; }
        .step { padding: 24px 17px; text-align: center; }
        .step-number {
            display: grid;
            place-items: center;
            width: 57px;
            height: 57px;
            margin: 0 auto 20px;
            border: 1px solid #ccebe6;
            border-radius: 18px;
            background: white;
            color: var(--teal);
            font-size: 19px;
            font-weight: 800;
        }
        .step h3 { margin-bottom: 10px; color: var(--navy); font-size: 17px; }
        .step p { color: var(--muted); font-size: 13px; }

        .page-hero {
            padding: 77px 0;
            background:
                radial-gradient(ellipse at 88% 20%, #c9f2eb, transparent 33%),
                linear-gradient(120deg, #f0f8fc, #f7fbfc);
        }
        .page-hero h1 {
            max-width: 800px;
            margin: 17px 0;
            color: var(--navy);
            font-size: clamp(35px, 4.5vw, 51px);
            letter-spacing: -1.8px;
        }
        .page-hero .lead { max-width: 700px; }
        .breadcrumb { margin-bottom: 20px; color: #748699; font-size: 12px; }
        .breadcrumb a { color: #128f88; font-weight: 700; }

        .cta { padding: 25px 0 75px; }
        .cta-box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
            padding: 39px 43px;
            border-radius: 23px;
            background: linear-gradient(115deg, #102b46, #176b87);
            color: white;
        }
        .cta-box h2 { margin-bottom: 8px; font-size: 27px; }
        .cta-box p { color: #d4e5ed; font-size: 13px; }

        footer { padding: 27px 0; border-top: 1px solid var(--line); }
        .footer-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }
        .footer-brand { color: var(--navy); font-size: 16px; font-weight: 800; }
        .footer-copy { color: var(--muted); font-size: 11px; }
        .footer-links { display: flex; flex-wrap: wrap; gap: 20px; color: #607286; font-size: 12px; }
        .footer-links a:hover { color: var(--teal); }

        @media (max-width: 850px) {
            .nav-links { gap: 14px; }
            .hero-grid { gap: 30px; }
            .hero h1 { font-size: 43px; }
            .grid-3 { gap: 13px; }
            .feature { padding: 22px; }
        }
        @media (max-width: 650px) {
            .nav-inner { min-height: 68px; }
            .brand { font-size: 18px; }
            .brand-mark { width: 38px; height: 38px; }
            .nav-links { gap: 10px; font-size: 11px; }
            .nav-links a:not(.btn) { display: none; }
            .nav-links .btn { padding: 10px 12px; font-size: 11px; }
            .hero-grid { grid-template-columns: 1fr; padding-top: 48px; padding-bottom: 59px; }
            .hero h1 { font-size: 42px; letter-spacing: -1.5px; }
            .lead { font-size: 14px; }
            .visual { max-width: 440px; width: 100%; margin: auto; }
            .visual-card { padding: 22px; }
            .floating { right: 0; }
            .section { padding: 61px 0; }
            .grid-3 { grid-template-columns: 1fr; }
            .feature { padding: 25px; }
            .page-hero { padding: 52px 0; }
            .cta { padding-bottom: 55px; }
            .cta-box { align-items: flex-start; flex-direction: column; padding: 29px 24px; }
            .cta-box h2 { font-size: 24px; }
            .footer-inner { align-items: flex-start; flex-direction: column; }
        }

        @media (prefers-reduced-motion: reduce) {
            html { scroll-behavior: auto; }
            *, *::before, *::after { transition: none !important; }
        }
    </style>
</head>
<body>
    <header class="navbar">
        <div class="container nav-inner">
            <a class="brand" href="{{ route('home') }}">
                <span class="brand-mark">S</span>
                <span>SuaraWarga</span>
            </a>

            <nav class="nav-links" aria-label="Navigasi utama">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('layanan') }}" class="{{ request()->routeIs('layanan') ? 'active' : '' }}">Layanan</a>
                <a href="{{ route('cara-kerja') }}" class="{{ request()->routeIs('cara-kerja') ? 'active' : '' }}">Cara Kerja</a>
                <a class="btn btn-outline" href="{{ route('login') }}">Masuk</a>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container footer-inner">
            <div>
                <div class="footer-brand">SuaraWarga</div>
                <div class="footer-copy">
                    © {{ date('Y') }} SuaraWarga · Layanan Pengaduan Masyarakat
                </div>
            </div>
            <nav class="footer-links" aria-label="Navigasi footer">
                <a href="{{ route('home') }}">Beranda</a>
                <a href="{{ route('layanan') }}">Layanan</a>
                <a href="{{ route('cara-kerja') }}">Cara Kerja</a>
                <a href="{{ route('login') }}">Masuk</a>
            </nav>
        </div>
    </footer>
</body>
</html>