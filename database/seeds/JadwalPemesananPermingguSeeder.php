<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\JadwalPemesananPerminggu;

class JadwalPemesananPermingguSeeder extends Seeder
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
                'id_pemesanan' => 1,
                'hari' => 'Kamis',
                'jam' => '14:00'
            ],
            [
                'id_pemesanan' => 1,
                'hari' => 'Minggu',
                'jam' => '14:00'
            ],
            [
                'id_pemesanan' => 2,
                'hari' => 'Rabu',
                'jam' => '15:00'
            ],
            [
                'id_pemesanan' => 3,
                'hari' => 'Jumat',
                'jam' => '10:00'
            ],
            [
                'id_pemesanan' => 4,
                'hari' => 'Sabtu',
                'jam' => '10:30'
            ]
        ];

        JadwalPemesananPerminggu::insert($data);
    }
}
