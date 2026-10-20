@extends('layouts.public')

@section('title', 'Cara Kerja')

@section('content')
<section class="page-hero">
    <div class="container">
        <div class="breadcrumb"><a href="{{ route('home') }}">Beranda</a> / Cara Kerja</div>
        <div class="eyebrow"><span class="dot"></span> Panduan Pengguna</div>
        <h1>Alur pengaduan yang <span class="accent">mudah dipahami.</span></h1>
        <p class="lead">
            Ikuti tahapan berikut untuk menyampaikan pengaduan melalui
            SuaraWarga. Pastikan informasi yang kamu masukkan jelas dan sesuai keadaan.
        </p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head">
            <span class="kicker">Tahapan Pengaduan</span>
            <h2>Dari laporan hingga tindak lanjut</h2>
            <p>Setiap tahap membantu informasi pengaduan disampaikan dan dikelola secara lebih terstruktur.</p>
        </div>

        <div class="grid-3 steps">
            <article class="step">
                <div class="step-number">01</div>
                <h3>Login atau Daftar</h3>
                <p>Masuk ke akun. Jika belum mempunyai akun, gunakan fasilitas pendaftaran yang tersedia pada halaman login.</p>
            </article>

            <article class="step">
                <div class="step-number">02</div>
                <h3>Isi Form Pengaduan</h3>
                <p>Lengkapi informasi yang diminta dalam formulir. Gunakan keterangan yang jelas agar laporan mudah dipahami.</p>
            </article>

            <article class="step">
                <div class="step-number">03</div>
                <h3>Pengaduan Dikelola</h3>
                <p>Pengaduan tersimpan dalam sistem dan dapat dikelola oleh petugas sesuai alur aplikasi.</p>
            </article>

            <article class="step">
                <div class="step-number">04</div>
                <h3>Klasifikasi Sistem</h3>
                <p>Jika diterapkan pada laporan tersebut, sistem Naive Bayes membantu mengelompokkan pengaduan berdasarkan data latih.</p>
            </article>

            <article class="step">
                <div class="step-number">05</div>
                <h3>Pembaruan Status</h3>
                <p>Admin memperbarui status pengaduan sesuai tahap penanganan, seperti menunggu, diproses, atau selesai.</p>
            </article>

            <article class="step">
                <div class="step-number">06</div>
                <h3>Penanganan Laporan</h3>
                <p>Pengaduan ditindaklanjuti sesuai proses dan kewenangan pihak yang menangani laporan.</p>
            </article>
        </div>
    </div>
</section>

<section class="cta">
    <div class="container">
        <div class="cta-box">
            <div>
                <h2>Mulai sampaikan aspirasi</h2>
                <p>Masuk terlebih dahulu untuk membuka formulir pengaduan.</p>
            </div>
            <a class="btn btn-white" href="{{ route('login') }}">Login untuk Melanjutkan →</a>
        </div>
    </div>
</section>
@endsection