<?php

namespace App\Services;

use App\Models\DataLatih;

class NaiveBayesService
{
    public function klasifikasi(string $teks): string
    {
        $dataLatih = DataLatih::all();

        if ($dataLatih->isEmpty()) {
            return 'Belum Ada Data Latih';
        }

        $kategoriList = $dataLatih
            ->pluck('kategori')
            ->filter()
            ->unique()
            ->values();

        if ($kategoriList->isEmpty()) {
            return 'Belum Ada Data Latih';
        }

        $jumlahData = $dataLatih->count();
        $kataPengaduan = $this->tokenisasi($teks);
        $hasilProbabilitas = [];

        // Kumpulan seluruh kosakata dari data latih
        $semuaKosakata = [];

        foreach ($dataLatih as $data) {
            $semuaKosakata = array_merge(
                $semuaKosakata,
                $this->tokenisasi($data->teks_pengaduan ?? '')
            );
        }

        $kosakataUnik = array_unique($semuaKosakata);
        $jumlahKosakata = count($kosakataUnik);

        if ($jumlahKosakata === 0) {
            return 'Belum Ada Data Latih';
        }

        foreach ($kategoriList as $kategori) {
            $dataKategori = $dataLatih->where('kategori', $kategori);
            $jumlahKategori = $dataKategori->count();

            // Log probabilitas awal kategori
            $logProbabilitas = log($jumlahKategori / $jumlahData);

            $frekuensiKata = [];
            $totalKataKategori = 0;

            // Hitung frekuensi kata pada data kategori
            foreach ($dataKategori as $data) {
                $kataLatih = $this->tokenisasi(
                    $data->teks_pengaduan ?? ''
                );

                foreach ($kataLatih as $kata) {
                    $frekuensiKata[$kata] =
                        ($frekuensiKata[$kata] ?? 0) + 1;

                    $totalKataKategori++;
                }
            }

            // Hitung probabilitas setiap kata dengan Laplace smoothing
            foreach ($kataPengaduan as $kata) {
                $frekuensi = $frekuensiKata[$kata] ?? 0;

                $probabilitasKata = (
                    ($frekuensi + 1) /
                    ($totalKataKategori + $jumlahKosakata)
                );

                $logProbabilitas += log($probabilitasKata);
            }

            $hasilProbabilitas[$kategori] = $logProbabilitas;
        }

        arsort($hasilProbabilitas);

        return (string) array_key_first($hasilProbabilitas);
    }

    private function tokenisasi(string $teks): array
    {
        $teks = mb_strtolower($teks, 'UTF-8');

        $teks = preg_replace(
            '/[^\p{L}\p{N}\s]/u',
            ' ',
            $teks
        );

        $kata = preg_split('/\s+/u', trim($teks));

        return array_values(
            array_filter(
                $kata ?: [],
                fn ($item) => $item !== ''
            )
        );
    }
}