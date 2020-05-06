<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\KriteriaBobotTarget;

class KriteriaBobotTargetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'kriteria' => 'Pengalaman Mengajar',
                'bobot' => 0.3,
                'faktor_kriteria' => 'Core Factor',
                'nilai_target' => 4,
            ],
            [
                'kriteria' => 'Volume dan Artikulasi Suara Video Microteaching',
                'bobot' => 0.1,
                'faktor_kriteria' => 'Core Factor',
                'nilai_target' => 4,
            ],
            [
                'kriteria' => 'Keefektifan Kalimat Video Microteaching',
                'bobot' => 0.1,
                'faktor_kriteria' => 'Core Factor',
                'nilai_target' => 3,
            ],
            [
                'kriteria' => 'Cara Mengajar Video Microteaching',
                'bobot' => 0.1,
                'faktor_kriteria' => 'Core Factor',
                'nilai_target' => 4,
            ],
            [
                'kriteria' => 'Penguasaan Materi Video Microteaching',
                'bobot' => 0.1,
                'faktor_kriteria' => 'Core Factor',
                'nilai_target' => 5,
            ],
            [
                'kriteria' => 'Nilai Indeks Prestasi Terakhir (IPK)',
                'bobot' => 0.06,
                'faktor_kriteria' => 'Secondary Factor',
                'nilai_target' => 4,
            ],
            [
                'kriteria' => 'Usia Guru',
                'bobot' => 0.12,
                'faktor_kriteria' => 'Secondary Factor',
                'nilai_target' => 4,
            ],
            [
                'kriteria' => 'Ketersediaan Mata Pelajaran',
                'bobot' => 0.12,
                'faktor_kriteria' => 'Secondary Factor',
                'nilai_target' => 4,
            ],
        ];

        KriteriaBobotTarget::insert($data);
    }
}
