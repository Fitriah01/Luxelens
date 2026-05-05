<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        Package::truncate();

        $packages = [
            [
                'nama_paket'  => 'Wedding & Engagement',
                'slug'        => 'wedding',
                'deskripsi'   => 'Abadikan momen sakral pernikahan Anda dengan tim fotografer profesional kami.',
                'harga'       => 5000000,
                'kategori'    => 'wedding',
                'is_popular'  => true,
                'fasilitas'   => [
                    '2 Fotografer Profesional',
                    'Dokumentasi Full Day',
                    'Semua File RAW + Edited',
                    '50 Foto Editing Premium',
                    '1 Album Fisik Hardcover',
                    'Konsultasi Pre-Session',
                ],
            ],
            [
                'nama_paket'  => 'Pre-Wedding',
                'slug'        => 'prewed',
                'deskripsi'   => 'Sesi foto romantis sebelum hari H dengan konsep kreatif sesuai pasangan.',
                'harga'       => 2500000,
                'kategori'    => 'prewed',
                'is_popular'  => false,
                'fasilitas'   => [
                    '1 Fotografer Senior',
                    'Sesi 3 Jam',
                    '20 Foto Editing Premium',
                    'Dua Lokasi Pemotretan',
                    'Soft Copy Hi-Res',
                ],
            ],
            [
                'nama_paket'  => 'Graduation & Family',
                'slug'        => 'wisuda',
                'deskripsi'   => 'Rayakan pencapaian & momen kebersamaan keluarga dengan kenangan indah.',
                'harga'       => 1500000,
                'kategori'    => 'wisuda',
                'is_popular'  => false,
                'fasilitas'   => [
                    '1 Fotografer',
                    'Sesi 1 Jam',
                    '10 Foto Editing Premium',
                    'Cetak 12R (2 lembar)',
                    'Soft Copy Hi-Res',
                ],
            ],
        ];

        foreach ($packages as $pkg) {
            Package::create($pkg);
        }
    }
}
