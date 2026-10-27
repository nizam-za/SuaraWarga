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
- [ ✅ ] Setiap anggota melakukan commit sesuai tugasnya.
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


### PEMBAGIAN TUGAS KELOMPOK

## SuaraWarga — Sistem Pengaduan Masyarakat Berbasis Web Menggunakan Laravel dengan Metode Naive Bayes

### 1. NIZAM

**NIM: 24105111089**

**Tanggung Jawab: Antarmuka Website dan Integrasi Sistem**

Tugas:

1. Mengembangkan halaman utama SuaraWarga.
2. Membuat halaman informasi Layanan dan Cara Kerja Sistem.
3. Mengembangkan tampilan dashboard agar lebih modern dan responsif.
4. Mengatur navigasi halaman menggunakan Blade dan routing Laravel.
5. Memastikan tampilan website dapat digunakan melalui laptop maupun HP.
6. Membantu mengintegrasikan tampilan dengan fitur-fitur aplikasi.
7. Mengunggah perubahan kode ke GitHub sesuai tugas yang dikerjakan.

**Target hasil:** Halaman utama, halaman layanan, halaman cara kerja, dan antarmuka yang terintegrasi dengan aplikasi.

### 2. SALMAN FARISI

**NIM: 24105111080**

**Tanggung Jawab: Autentikasi dan Pengelolaan Pengaduan Masyarakat**

Tugas:

1. Mengelola fitur registrasi dan login pengguna.
2. Mengembangkan fitur pembuatan pengaduan masyarakat.
3. Mengembangkan fitur untuk melihat daftar pengaduan milik pengguna.
4. Mengelola penyimpanan data pengaduan melalui Laravel dan MySQL.
5. Mengelola status pengaduan, yaitu Menunggu, Diproses, dan Selesai.
6. Memastikan pengguna dapat mengakses fitur sesuai hak aksesnya.
7. Mengunggah perubahan kode ke GitHub sesuai tugas yang dikerjakan.

**Target hasil:** Fitur autentikasi, pengiriman pengaduan, daftar pengaduan pengguna, dan pengelolaan status pengaduan.

### 3. M. SHAMDI QOWIE

**NIM: 24105111169**

**Tanggung Jawab: Database dan Metode Klasifikasi Naive Bayes**

Tugas:

1. Mengelola database MySQL melalui phpMyAdmin.
2. Memastikan tabel pengaduan dan data latih tersedia sesuai kebutuhan aplikasi.
3. Mengelola fitur tambah, lihat, ubah, dan hapus data latih.
4. Menyiapkan data latih berdasarkan kategori pengaduan.
5. Mengembangkan dan menguji proses klasifikasi teks pengaduan menggunakan metode Naive Bayes.
6. Menjelaskan perhitungan probabilitas dan hasil klasifikasi berdasarkan data latih.
7. Mengunggah perubahan kode ke GitHub sesuai tugas yang dikerjakan.

**Target hasil:** Database yang sesuai dengan aplikasi, fitur pengelolaan data latih, dan implementasi metode Naive Bayes yang dapat diuji.

### 4. RAFFI KHAIRAN

**NIM: 24105111168**

**Tanggung Jawab: Dashboard Admin, Pengujian, dan Dokumentasi**

Tugas:

1. Mengembangkan dan menguji dashboard admin.
2. Mengelola tampilan ringkasan statistik pengaduan.
3. Menguji fitur admin untuk melihat pengaduan dan memperbarui statusnya.
4. Melakukan pengujian terhadap fitur utama aplikasi, termasuk login, pengaduan, dan klasifikasi Naive Bayes.
5. Menyiapkan dokumentasi berupa tangkapan layar dan hasil pengujian.
6. Membantu menyusun laporan proyek dan materi presentasi.
7. Mengunggah perubahan kode serta dokumentasi ke GitHub sesuai tugas yang dikerjakan.

**Target hasil:** Dashboard admin, hasil pengujian sistem, dokumentasi aplikasi, dan bahan pendukung laporan serta presentasi.

---

## E. TANGGUNG JAWAB SELURUH ANGGOTA

Setiap anggota kelompok wajib:

1. Memahami tujuan dan cara kerja aplikasi SuaraWarga.
2. Mengerjakan bagian yang telah menjadi tanggung jawabnya.
3. Melakukan commit ke GitHub menggunakan akun masing-masing.
4. Memastikan perubahan kode yang diunggah sesuai dengan pekerjaan yang benar-benar dilakukan.
5. Membantu pengujian integrasi seluruh fitur aplikasi.
6. Berpartisipasi dalam penyusunan laporan dan presentasi.
7. Memahami implementasi Laravel, database MySQL, dan metode Naive Bayes sesuai bagian tugasnya.

## F. PEMBAGIAN KONTRIBUSI GITHUB

Setiap anggota menggunakan akun GitHub masing-masing untuk menunjukkan kontribusi yang dapat diperiksa.

| No. | Nama | Kontribusi Utama |
| --- | --- | --- |
| 1 | Nizam | Antarmuka website, halaman layanan, cara kerja, dan navigasi |
| 2 | Salman Farisi | Autentikasi dan fitur pengaduan masyarakat |
| 3 | M. Shamdi Qowie | Database, data latih, dan klasifikasi Naive Bayes |
| 4 | Raffi Khairan | Dashboard admin, pengujian, dan dokumentasi |

Seluruh anggota menggunakan satu repository kelompok, dengan syarat setiap anggota telah bergabung sebagai collaborator. Setiap anggota perlu melakukan commit atas perubahan yang benar-benar dikerjakannya.

## G. PENUTUP

Pembagian tugas ini disusun berdasarkan fitur utama aplikasi SuaraWarga, yaitu autentikasi pengguna, pengaduan masyarakat, klasifikasi otomatis menggunakan metode Naive Bayes, manajemen pengaduan, manajemen data latih, dashboard, dan informasi layanan.

Melalui pembagian tugas ini, setiap anggota diharapkan memiliki tanggung jawab yang jelas dalam pengembangan aplikasi, kontribusi GitHub, penyusunan laporan, dan presentasi proyek.