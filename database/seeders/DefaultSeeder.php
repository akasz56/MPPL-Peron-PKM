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

        Department::create(['name' => 'Manajemen Sumberdaya Lahan', 'faculty_id' => 1]);
        Department::create(['name' => 'Agronomi Dan Hortikultura', 'faculty_id' => 1]);
        Department::create(['name' => 'Proteksi Tanaman', 'faculty_id' => 1]);
        Department::create(['name' => 'Arsitektur Lanskap', 'faculty_id' => 1]);

        Department::create(['name' => 'Kedokteran Hewan', 'faculty_id' => 2]);

        Department::create(['name' => 'Teknologi & Manajemen Perikanan Budidaya', 'faculty_id' => 3]);
        Department::create(['name' => 'Manajemen Sumberdaya Perairan', 'faculty_id' => 3]);
        Department::create(['name' => 'Teknologi Hasil Perairan', 'faculty_id' => 3]);
        Department::create(['name' => 'Teknologi & Manajemen Perikanan Tangkap', 'faculty_id' => 3]);
        Department::create(['name' => 'Ilmu Dan Teknologi Kelautan', 'faculty_id' => 3]);

        Department::create(['name' => 'Teknologi Produksi Ternak', 'faculty_id' => 4]);
        Department::create(['name' => 'Nutrisi Dan Teknologi Pakan', 'faculty_id' => 4]);
        Department::create(['name' => 'Teknologi Hasil Ternak', 'faculty_id' => 4]);

        Department::create(['name' => 'Manajemen Hutan', 'faculty_id' => 5]);
        Department::create(['name' => 'Teknologi Hasil Hutan', 'faculty_id' => 5]);
        Department::create(['name' => 'Konservasi Sumberdaya Hutan & Ekowisata', 'faculty_id' => 5]);
        Department::create(['name' => 'Silvikultur', 'faculty_id' => 5]);

        Department::create(['name' => 'Teknik Pertanian Dan Biosistem', 'faculty_id' => 6]);
        Department::create(['name' => 'Teknologi Pangan', 'faculty_id' => 6]);
        Department::create(['name' => 'Teknik Industri Pertanian', 'faculty_id' => 6]);
        Department::create(['name' => 'Teknik Sipil Dan Lingkungan', 'faculty_id' => 6]);

        Department::create(['name' => 'Statistika Dan Sains Data', 'faculty_id' => 7]);
        Department::create(['name' => 'Meteorologi Terapan', 'faculty_id' => 7]);
        Department::create(['name' => 'Biologi', 'faculty_id' => 7]);
        Department::create(['name' => 'Kimia', 'faculty_id' => 7]);
        Department::create(['name' => 'Matematika', 'faculty_id' => 7]);
        Department::create(['name' => 'Ilmu Komputer', 'faculty_id' => 7]);
        Department::create(['name' => 'Fisika', 'faculty_id' => 7]);
        Department::create(['name' => 'Biokimia', 'faculty_id' => 7]);
        Department::create(['name' => 'Aktuaria', 'faculty_id' => 7]);

        Department::create(['name' => 'Ekonomi Pembangunan', 'faculty_id' => 8]);
        Department::create(['name' => 'Manajemen', 'faculty_id' => 8]);
        Department::create(['name' => 'Agribisnis', 'faculty_id' => 8]);
        Department::create(['name' => 'Ekonomi Sumberdaya Dan Lingkungan', 'faculty_id' => 8]);
        Department::create(['name' => 'Ilmu Ekonomi Syariah', 'faculty_id' => 8]);

        Department::create(['name' => 'Ilmu Gizi', 'faculty_id' => 9]);
        Department::create(['name' => 'Ilmu Keluarga Dan Konsumen', 'faculty_id' => 9]);
        Department::create(['name' => 'Komunikasi Dan Pengembangan Masyarakat', 'faculty_id' => 9]);

        Department::create(['name' => 'Bisnis', 'faculty_id' => 10]);

        Department::create(['name' => 'Komunikasi', 'faculty_id' => 11]);
        Department::create(['name' => 'Ekowisata', 'faculty_id' => 11]);
        Department::create(['name' => 'Manajemen Informatika', 'faculty_id' => 11]);
        Department::create(['name' => 'Teknik Komputer', 'faculty_id' => 11]);
        Department::create(['name' => 'Supervisor Jaminan Mutu Pangan', 'faculty_id' => 11]);
        Department::create(['name' => 'Manajemen Industri Jasa Makanan Dan Gizi', 'faculty_id' => 11]);
        Department::create(['name' => 'Teknologi Industri Benih', 'faculty_id' => 11]);
        Department::create(['name' => 'Teknologi Produksi Dan Manajemen Perikanan Budidaya', 'faculty_id' => 11]);
        Department::create(['name' => 'Teknologi Dan Manajemen Ternak', 'faculty_id' => 11]);
        Department::create(['name' => 'Manajemen Agribisnis', 'faculty_id' => 11]);
        Department::create(['name' => 'Manajemen Industri', 'faculty_id' => 11]);
        Department::create(['name' => 'Analisis Kimia', 'faculty_id' => 11]);
        Department::create(['name' => 'Teknik Dan Manajemen Lingkungan', 'faculty_id' => 11]);
        Department::create(['name' => 'Akuntansi', 'faculty_id' => 11]);
        Department::create(['name' => 'Paramedik Veteriner', 'faculty_id' => 11]);
        Department::create(['name' => 'Teknologi Produksi Dan Manajemen Perkebunan', 'faculty_id' => 11]);
        Department::create(['name' => 'Teknologi Produksi Dan Pengembangan Masyarakat Pertanian', 'faculty_id' => 11]);
    }
}
