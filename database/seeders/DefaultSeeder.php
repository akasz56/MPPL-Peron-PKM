<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faculty::create(['name' => 'Fakultas Pertanian']);
        Faculty::create(['name' => 'Fakultas Kedokteran Hewan']);
        Faculty::create(['name' => 'Fakultas Perikanan']);
        Faculty::create(['name' => 'Fakultas Peternakan']);
        Faculty::create(['name' => 'Fakultas Kehutanan dan Lingkungan']);
        Faculty::create(['name' => 'Fakultas Teknologi Pertanian']);
        Faculty::create(['name' => 'Fakultas Matematika dan Ilmu Pengetahuan Alam']);
        Faculty::create(['name' => 'Fakultas Ekonomi dan Manajemen']);
        Faculty::create(['name' => 'Fakultas Ekologi Manusia']);
        Faculty::create(['name' => 'Sekolah Bisnis']);
        Faculty::create(['name' => 'Sekolah Vokasi']);
        Department::create(['name' => 'MANAJEMEN SUMBERDAYA LAHAN', 'faculty_id' => 1]);
        Department::create(['name' => 'AGRONOMI DAN HORTIKULTURA', 'faculty_id' => 1]);
        Department::create(['name' => 'PROTEKSI TANAMAN', 'faculty_id' => 1]);
        Department::create(['name' => 'ARSITEKTUR LANSKAP', 'faculty_id' => 1]);

        Department::create(['name' => 'KEDOKTERAN HEWAN', 'faculty_id' => 2]);
        Department::create(['name' => 'TEKNOLOGI & MANAJEMEN PERIKANAN BUDIDAYA', 'faculty_id' => 2]);
        Department::create(['name' => 'MANAJEMEN SUMBERDAYA PERAIRAN', 'faculty_id' => 2]);
        Department::create(['name' => 'TEKNOLOGI HASIL PERAIRAN', 'faculty_id' => 2]);
        Department::create(['name' => 'TEKNOLOGI & MANAJEMEN PERIKANAN TANGKAP', 'faculty_id' => 2]);
        Department::create(['name' => 'ILMU DAN TEKNOLOGI KELAUTAN', 'faculty_id' => 2]);

        Department::create(['name' => 'TEKNOLOGI PRODUKSI TERNAK', 'faculty_id' => 3]);
        Department::create(['name' => 'NUTRISI DAN TEKNOLOGI PAKAN', 'faculty_id' => 3]);
        Department::create(['name' => 'TEKNOLOGI HASIL TERNAK', 'faculty_id' => 3]);

        Department::create(['name' => 'MANAJEMEN HUTAN', 'faculty_id' => 4]);
        Department::create(['name' => 'TEKNOLOGI HASIL HUTAN', 'faculty_id' => 4]);
        Department::create(['name' => 'KONSERVASI SUMBERDAYA HUTAN & EKOWISATA', 'faculty_id' => 4]);
        Department::create(['name' => 'SILVIKULTUR', 'faculty_id' => 4]);

        Department::create(['name' => 'TEKNIK PERTANIAN DAN BIOSISTEM', 'faculty_id' => 5]);
        Department::create(['name' => 'TEKNOLOGI PANGAN', 'faculty_id' => 5]);
        Department::create(['name' => 'TEKNIK INDUSTRI PERTANIAN', 'faculty_id' => 5]);
        Department::create(['name' => 'TEKNIK SIPIL DAN LINGKUNGAN', 'faculty_id' => 5]);

        Department::create(['name' => 'STATISTIKA DAN SAINS DATA', 'faculty_id' => 6]);
        Department::create(['name' => 'METEOROLOGI TERAPAN', 'faculty_id' => 6]);
        Department::create(['name' => 'BIOLOGI', 'faculty_id' => 6]);
        Department::create(['name' => 'KIMIA', 'faculty_id' => 6]);
        Department::create(['name' => 'MATEMATIKA', 'faculty_id' => 6]);
        Department::create(['name' => 'ILMU KOMPUTER', 'faculty_id' => 6]);
        Department::create(['name' => 'FISIKA', 'faculty_id' => 6]);
        Department::create(['name' => 'BIOKIMIA', 'faculty_id' => 6]);
        Department::create(['name' => 'AKTUARIA', 'faculty_id' => 6]);

        Department::create(['name' => 'EKONOMI PEMBANGUNAN', 'faculty_id' => 7]);
        Department::create(['name' => 'MANAJEMEN', 'faculty_id' => 7]);
        Department::create(['name' => 'AGRIBISNIS', 'faculty_id' => 7]);
        Department::create(['name' => 'EKONOMI SUMBERDAYA DAN LINGKUNGAN', 'faculty_id' => 7]);
        Department::create(['name' => 'ILMU EKONOMI SYARIAH', 'faculty_id' => 7]);

        Department::create(['name' => 'ILMU GIZI', 'faculty_id' => 8]);
        Department::create(['name' => 'ILMU KELUARGA DAN KONSUMEN', 'faculty_id' => 8]);
        Department::create(['name' => 'KOMUNIKASI DAN PENGEMBANGAN MASYARAKAT', 'faculty_id' => 8]);

        Department::create(['name' => 'BISNIS', 'faculty_id' => 9]);

        Department::create(['name' => 'KOMUNIKASI', 'faculty_id' => 10]);
        Department::create(['name' => 'EKOWISATA', 'faculty_id' => 10]);
        Department::create(['name' => 'MANAJEMEN INFORMATIKA', 'faculty_id' => 10]);
        Department::create(['name' => 'TEKNIK KOMPUTER', 'faculty_id' => 10]);
        Department::create(['name' => 'SUPERVISOR JAMINAN MUTU PANGAN', 'faculty_id' => 10]);
        Department::create(['name' => 'MANAJEMEN INDUSTRI JASA MAKANAN DAN GIZI', 'faculty_id' => 10]);
        Department::create(['name' => 'TEKNOLOGI INDUSTRI BENIH', 'faculty_id' => 10]);
        Department::create(['name' => 'TEKNOLOGI PRODUKSI DAN MANAJEMEN PERIKANAN BUDIDAYA', 'faculty_id' => 10]);
        Department::create(['name' => 'TEKNOLOGI DAN MANAJEMEN TERNAK', 'faculty_id' => 10]);
        Department::create(['name' => 'MANAJEMEN AGRIBISNIS', 'faculty_id' => 10]);
        Department::create(['name' => 'MANAJEMEN INDUSTRI', 'faculty_id' => 10]);
        Department::create(['name' => 'ANALISIS KIMIA', 'faculty_id' => 10]);
        Department::create(['name' => 'TEKNIK DAN MANAJEMEN LINGKUNGAN', 'faculty_id' => 10]);
        Department::create(['name' => 'AKUNTANSI', 'faculty_id' => 10]);
        Department::create(['name' => 'PARAMEDIK VETERINER', 'faculty_id' => 10]);
        Department::create(['name' => 'TEKNOLOGI PRODUKSI DAN MANAJEMEN PERKEBUNAN', 'faculty_id' => 10]);
        Department::create(['name' => 'TEKNOLOGI PRODUKSI DAN PENGEMBANGAN MASYARAKAT PERTANIAN', 'faculty_id' => 10]);
    }
}
