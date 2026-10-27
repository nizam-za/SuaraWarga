# SuaraWarga — Sistem Pengaduan Masyarakat Berbasis Web

SuaraWarga adalah aplikasi berbasis web yang dibangun menggunakan framework Laravel untuk membantu masyarakat menyampaikan pengaduan terkait permasalahan di lingkungan sekitar. Aplikasi ini dilengkapi dengan fitur pengelolaan pengaduan dan klasifikasi kategori pengaduan menggunakan metode **Naive Bayes**.

## Fitur Utama

- **Autentikasi pengguna:** registrasi dan login.
- **Pengaduan masyarakat:** pengguna dapat membuat dan melihat daftar pengaduannya.
- **Klasifikasi otomatis:** sistem menentukan kategori pengaduan menggunakan metode Naive Bayes berdasarkan data latih yang tersedia.
- **Manajemen pengaduan:** admin dapat melihat pengaduan dan memperbarui statusnya.
- **Manajemen data latih:** admin dapat menambah, melihat, mengubah, dan menghapus data latih untuk klasifikasi.
- **Dashboard:** menampilkan ringkasan informasi pengaduan.
- **Informasi layanan:** menyediakan halaman layanan dan cara kerja sistem.

## Teknologi yang Digunakan

- PHP
- Laravel
- MySQL
- Blade
- Tailwind CSS
- JavaScript
- Vite
- Composer
- Node.js dan NPM

## Metode Klasifikasi

SuaraWarga menggunakan metode **Naive Bayes** untuk mengklasifikasikan teks pengaduan berdasarkan data latih yang tersimpan di database.

Proses klasifikasi secara umum meliputi:
1. Menerima judul dan isi pengaduan.
2. Mengolah teks menjadi kumpulan kata.
3. Menghitung probabilitas kategori berdasarkan data latih.
4. Menentukan kategori dengan nilai probabilitas tertinggi.

Hasil klasifikasi bergantung pada kualitas dan jumlah data latih yang tersedia.

## Persyaratan Sistem

Pastikan perangkat sudah memiliki:

- PHP yang sesuai dengan persyaratan versi Laravel pada proyek.
- Composer.
- MySQL atau MariaDB.
- Node.js dan NPM.
- Git.

## Cara Instalasi

### 1. Clone repositori

```bash
git clone https://github.com/nizam-za/SuaraWarga.git
cd SuaraWarga
```

### 2. Instal dependensi PHP

```bash
composer install
```

### 3. Siapkan file konfigurasi

```bash
copy .env.example .env
```

### 4. Buat database

Buat database MySQL bernama `suarawarga` melalui phpMyAdmin atau MySQL.

Sesuaikan konfigurasi database pada file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=suarawarga
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan nama database, username, dan password dengan konfigurasi MySQL pada perangkat masing-masing.

### 5. Buat application key

```bash
php artisan key:generate
```

### 6. Jalankan migrasi database

```bash
php artisan migrate --seed
```

Seeder digunakan untuk mengisi data awal yang telah disediakan oleh proyek. Akun admin atau akun pengguna harus disiapkan sesuai mekanisme yang tersedia dalam aplikasi.

### 7. Instal dependensi frontend

```bash
npm install
```

### 8. Bangun aset frontend

```bash
npm run build
```

### 9. Jalankan aplikasi

```bash
php artisan serve
```

Buka alamat berikut di browser:

`http://127.0.0.1:8000`

## Repository

Kode sumber SuaraWarga tersedia di GitHub:

https://github.com/nizam-za/SuaraWarga

## Tujuan Pengembangan

Proyek ini dikembangkan sebagai penerapan framework Laravel dalam pembangunan aplikasi web, pengelolaan database MySQL, implementasi operasi CRUD, serta penerapan metode klasifikasi teks Naive Bayes.

## Catatan

SuaraWarga merupakan proyek pengembangan sistem informasi pengaduan masyarakat. Untuk menjalankan aplikasi di lingkungan baru, pengguna perlu menyesuaikan konfigurasi database dan memastikan data awal serta akun yang dibutuhkan telah tersedia.


## PENILAIAN

## A. Ketentuan Tugas
1. Setiap kelompok mengerjakan satu proyek sesuai judul yang dipilih.
2. Aplikasi dibuat menggunakan Laravel dan MySQL.
3. Setiap kelompok menerapkan metode sesuai judul proyek.
4. Setiap mahasiswa wajib berkontribusi di GitHub menggunakan akun masing-masing.
5. Setiap kelompok mempresentasikan hasil proyek.

## B. Checklist Tugas

- [ ✅ ] Membuat aplikasi Laravel sesuai judul.
- [ ✅ ] Membuat database dan fitur CRUD.
- [ ✅ ] Menerapkan metode sesuai judul.
- [ ✅ ] Mengunggah source code ke GitHub.
- [ ❌ ] Setiap anggota melakukan commit sesuai tugasnya.
- [ ✅ ] Membuat laporan singkat dengan README.md
- [ ✅ ] Melakukan presentasi dan demo aplikasi.

## C. Ketentuan GitHub
- Satu repository untuk setiap kelompok.
- Semua anggota bergabung sebagai collaborator.
- Setiap anggota wajib memiliki kontribusi yang dapat diperiksa.
- Cantumkan link repository pada laporan.

## D. Penilaian

| Komponen | Bobot |
|---|---:|
| Aplikasi Laravel | 40% |
| Penerapan metode | 20% |
| Kontribusi GitHub | 20% |
| Laporan dan presentasi | 20% |
| **Total** | **100%** |

**Catatan:** Fokus penilaian adalah aplikasi yang berjalan, metode yang diterapkan, dan kerja sama setiap anggota kelompok.