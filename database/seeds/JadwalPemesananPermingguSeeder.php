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
                'start' => '14:00',
                'end' => '15:30'
            ],
            [
                'id_pemesanan' => 1,
                'hari' => 'Minggu',
                'start' => '14:00',
                'end' => '15:30'
            ],
            [
                'id_pemesanan' => 2,
                'hari' => 'Rabu',
                'start' => '15:00',
                'end' => '15:30'
            ],
            [
                'id_pemesanan' => 3,
                'hari' => 'Jumat',
                'start' => '10:00',
                'end' => '11:30'
            ],
            [
                'id_pemesanan' => 4,
                'hari' => 'Sabtu',
                'start' => '10:30',
                'end' => '11:30'
            ]
        ];

        JadwalPemesananPerminggu::insert($data);
    }
}
