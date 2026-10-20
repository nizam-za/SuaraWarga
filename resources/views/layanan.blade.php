@extends('layouts.public')

@section('title', 'Layanan')

@section('content')
<section class="page-hero">
    <div class="container">
        <div class="breadcrumb"><a href="{{ route('home') }}">Beranda</a> / Layanan</div>
        <div class="eyebrow"><span class="dot"></span> Layanan SuaraWarga</div>
        <h1>Layanan digital untuk <span class="accent">aspirasi masyarakat.</span></h1>
        <p class="lead">
            Kenali fasilitas SuaraWarga yang membantu masyarakat menyampaikan
            pengaduan dan membantu petugas mengelola informasi laporan secara terstruktur.
        </p>
        <div class="actions">
            <a class="btn btn-primary" href="{{ route('login') }}">Gunakan Layanan →</a>
            <a class="btn btn-outline" href="{{ route('cara-kerja') }}">Pelajari Alurnya</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head">
            <span class="kicker">Fasilitas Sistem</span>
            <h2>Bagaimana SuaraWarga membantu?</h2>
            <p>Fitur berikut disesuaikan dengan sistem pengaduan yang tersedia.</p>
        </div>

        <div class="grid-3">
            <article class="feature">
                <div class="feature-icon">📣</div>
                <h3>Penyampaian Pengaduan</h3>
                <p>Pengguna yang sudah login dapat mengisi formulir pengaduan dengan informasi yang dibutuhkan.</p>
                <a class="feature-link" href="{{ route('login') }}">Mulai melalui login →</a>
            </article>

            <article class="feature">
                <div class="feature-icon">🧠</div>
                <h3>Klasifikasi Naive Bayes</h3>
                <p>Sistem memanfaatkan data latih untuk membantu mengklasifikasikan teks pengaduan sesuai implementasi aplikasi.</p>
            </article>

            <article class="feature">
                <div class="feature-icon">🗂️</div>
                <h3>Pengelolaan Pengaduan</h3>
                <p>Petugas admin dapat melihat laporan, membuka detail, serta memperbarui status pengaduan.</p>
            </article>

            <article class="feature">
                <div class="feature-icon">📚</div>
                <h3>Data Latih</h3>
                <p>Admin dapat mengelola data latih yang digunakan dalam proses klasifikasi sesuai sistem yang ada.</p>
            </article>

            <article class="feature">
                <div class="feature-icon">👤</div>
                <h3>Akun Pengguna</h3>
                <p>Pengguna dapat masuk ke akun untuk mengakses halaman pengaduan dan pengaturan profil.</p>
                <a class="feature-link" href="{{ route('login') }}">Masuk ke akun →</a>
            </article>

            <article class="feature">
                <div class="feature-icon">🔄</div>
                <h3>Status Penanganan</h3>
                <p>Admin mengelola status laporan seperti menunggu, diproses, atau selesai sesuai proses penanganannya.</p>
            </article>
        </div>
    </div>
</section>

<section class="cta">
    <div class="container">
        <div class="cta-box">
            <div>
                <h2>Siap menyampaikan pengaduan?</h2>
                <p>Masuk ke akun untuk menggunakan layanan yang tersedia.</p>
            </div>
            <a class="btn btn-white" href="{{ route('login') }}">Masuk Sekarang →</a>
        </div>
    </div>
</section>
@endsection