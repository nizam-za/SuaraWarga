<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DataLatih;

class DataLatihSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['teks_pengaduan' => 'Jalan rusak dan berlubang membahayakan pengendara', 'kategori' => 'Infrastruktur'],
            ['teks_pengaduan' => 'Jembatan rusak perlu segera diperbaiki', 'kategori' => 'Infrastruktur'],
            ['teks_pengaduan' => 'Lampu jalan mati sehingga jalan gelap', 'kategori' => 'Infrastruktur'],
            ['teks_pengaduan' => 'Jalan desa mengalami kerusakan parah', 'kategori' => 'Infrastruktur'],
            ['teks_pengaduan' => 'Trotoar rusak dan berlubang', 'kategori' => 'Infrastruktur'],

            ['teks_pengaduan' => 'Sampah menumpuk di pinggir jalan', 'kategori' => 'Kebersihan'],
            ['teks_pengaduan' => 'Selokan kotor dan tersumbat sampah', 'kategori' => 'Kebersihan'],
            ['teks_pengaduan' => 'Lingkungan desa sangat kotor', 'kategori' => 'Kebersihan'],
            ['teks_pengaduan' => 'Sampah berserakan di sekitar pasar', 'kategori' => 'Kebersihan'],
            ['teks_pengaduan' => 'Bau tidak sedap dari tumpukan sampah', 'kategori' => 'Kebersihan'],

            ['teks_pengaduan' => 'Terjadi pencurian di rumah warga', 'kategori' => 'Keamanan'],
            ['teks_pengaduan' => 'Ada orang mencurigakan berkeliaran malam hari', 'kategori' => 'Keamanan'],
            ['teks_pengaduan' => 'Sering terjadi kehilangan sepeda motor', 'kategori' => 'Keamanan'],
            ['teks_pengaduan' => 'Warga merasa tidak aman karena gangguan malam', 'kategori' => 'Keamanan'],
            ['teks_pengaduan' => 'Terjadi perkelahian yang mengganggu ketertiban', 'kategori' => 'Keamanan'],

            ['teks_pengaduan' => 'Pengurusan surat administrasi sangat lambat', 'kategori' => 'Pelayanan Publik'],
            ['teks_pengaduan' => 'Petugas pelayanan tidak ramah kepada warga', 'kategori' => 'Pelayanan Publik'],
            ['teks_pengaduan' => 'Proses pembuatan surat keterangan terlalu lama', 'kategori' => 'Pelayanan Publik'],
            ['teks_pengaduan' => 'Warga kesulitan mengurus dokumen administrasi', 'kategori' => 'Pelayanan Publik'],
            ['teks_pengaduan' => 'Pelayanan kantor desa tidak sesuai jadwal', 'kategori' => 'Pelayanan Publik'],
        ];

        DataLatih::insert($data);
    }
}