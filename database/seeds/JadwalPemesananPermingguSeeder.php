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
                'id_jadwal_available' => 96
            ],
            [
                'id_pemesanan' => 1,
                'id_jadwal_available' => 108
            ],
            [
                'id_pemesanan' => 2,
                'id_jadwal_available' => 91
            ],
            [
                'id_pemesanan' => 3,
                'id_jadwal_available' => 100
            ],
            [
                'id_pemesanan' => 4,
                'id_jadwal_available' => 106
            ],
            [
                'id_pemesanan' => 9,
                'id_jadwal_available' => 85
            ]
        ];

        JadwalPemesananPerminggu::insert($data);
    }
}
