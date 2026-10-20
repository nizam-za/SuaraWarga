@extends('layouts.public')

@section('title', 'Beranda')

@section('content')
<section class="hero">
    <div class="container hero-grid">
        <div>
            <div class="eyebrow"><span class="dot"></span> Ruang Aspirasi Masyarakat</div>

            <h1>Suaramu berarti. <span class="accent">Perubahan dimulai di sini.</span></h1>

            <p class="lead">
                Sampaikan keluhan, laporan, dan aspirasi mengenai lingkunganmu
                melalui SuaraWarga. Satu langkah sederhana untuk membantu
                persoalan masyarakat dikelola dengan lebih terarah.
            </p>

            <div class="actions">
                <a class="btn btn-primary" href="{{ route('login') }}">
                    Buat Pengaduan <span>→</span>
                </a>
                <a class="btn btn-outline" href="{{ route('layanan') }}">
                    Jelajahi Layanan
                </a>
            </div>

            <p class="note">✓ Akses layanan secara online · Alur yang lebih terstruktur</p>
        </div>

        <div class="visual">
            <div class="visual-bg"></div>
            <div class="visual-card">
                <div class="visual-top">
                    <strong>SuaraWarga Digital</strong>
                    <span class="pill">LAYANAN PUBLIK</span>
                </div>

                <div class="visual-icon">📣</div>
                <h3>Aspirasi untuk lingkungan yang lebih baik</h3>
                <p>Sampaikan informasi pengaduan agar dapat dikelola melalui sistem.</p>

                <div class="progress-label">
                    <span>Alur pengaduan</span>
                    <span>3 tahap</span>
                </div>
                <div class="progress"><span></span></div>

                <div class="visual-footer">
                    <span style="font-size:23px">🗂️</span>
                    <div>
                        <strong>Pengelolaan terstruktur</strong>
                        <small>Informasi dan status pengaduan dikelola melalui sistem.</small>
                    </div>
                </div>
            </div>
            <div class="floating"><span>✓</span> Mulai dari suaramu</div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head">
            <span class="kicker">Kenali SuaraWarga</span>
            <h2>Teknologi untuk suara masyarakat</h2>
            <p>Dirancang untuk membantu masyarakat menyampaikan aspirasi dan membantu petugas mengelola laporan.</p>
        </div>

        <div class="grid-3">
            <article class="feature">
                <div class="feature-icon">📝</div>
                <h3>Pengaduan Online</h3>
                <p>Sampaikan persoalan yang ditemukan dengan informasi yang jelas melalui layanan digital.</p>
                <a class="feature-link" href="{{ route('layanan') }}">Lihat layanan →</a>
            </article>

            <article class="feature">
                <div class="feature-icon">🧠</div>
                <h3>Klasifikasi Pengaduan</h3>
                <p>Sistem menggunakan metode Naive Bayes untuk membantu mengelompokkan pengaduan berdasarkan data latih.</p>
                <a class="feature-link" href="{{ route('layanan') }}">Pelajari layanan →</a>
            </article>

            <article class="feature">
                <div class="feature-icon">🔎</div>
                <h3>Pengelolaan Status</h3>
                <p>Petugas dapat mengelola pengaduan dan memperbarui status penanganan melalui sistem.</p>
                <a class="feature-link" href="{{ route('cara-kerja') }}">Lihat cara kerja →</a>
            </article>
        </div>
    </div>
</section>

<section class="section section-muted">
    <div class="container">
        <div class="section-head">
            <span class="kicker">Mudah Dipahami</span>
            <h2>Mulai dengan tiga langkah</h2>
            <p>Ikuti alur pengaduan yang sederhana melalui sistem SuaraWarga.</p>
        </div>

        <div class="grid-3 steps">
            <article class="step">
                <div class="step-number">01</div>
                <h3>Masuk ke Akun</h3>
                <p>Masuk atau buat akun untuk menggunakan layanan pengaduan.</p>
            </article>
            <article class="step">
                <div class="step-number">02</div>
                <h3>Sampaikan Aspirasi</h3>
                <p>Isi informasi pengaduan secara jelas sesuai form yang tersedia.</p>
            </article>
            <article class="step">
                <div class="step-number">03</div>
                <h3>Proses Pengaduan</h3>
                <p>Petugas mengelola laporan dan memperbarui status sesuai prosesnya.</p>
            </article>
        </div>

        <div style="text-align:center;margin-top:20px">
            <a class="btn btn-primary" href="{{ route('cara-kerja') }}">Lihat Cara Kerja →</a>
        </div>
    </div>
</section>

<section class="cta">
    <div class="container">
        <div class="cta-box">
            <div>
                <h2>Ada yang ingin kamu sampaikan?</h2>
                <p>Mulai sampaikan aspirasi untuk lingkungan yang lebih baik.</p>
            </div>
            <a class="btn btn-white" href="{{ route('login') }}">Mulai Sekarang →</a>
        </div>
    </div>
</section>
@endsection