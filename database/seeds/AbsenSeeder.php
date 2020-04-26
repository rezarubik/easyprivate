<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Absen;

class AbsenSeeder extends Seeder
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
                'id_jadwal_ajar' => 1,
                'id_pemesanan' => 1,
                'waktu_absen' => '2020-03-19 15:24:00'
            ],
            [
                'id_jadwal_ajar' => 2,
                'id_pemesanan' => 1,
                'waktu_absen' => '2020-03-22 15:24:00'
            ],
            [
                'id_jadwal_ajar' => 3,
                'id_pemesanan' => 1,
                'waktu_absen' => '2020-03-26 15:24:00'
            ],
            [
                'id_jadwal_ajar' => 4,
                'id_pemesanan' => 1,
                'waktu_absen' => '2020-03-29 15:24:00'
            ],
            [
                'id_jadwal_ajar' => 5,
                'id_pemesanan' => 1,
                'waktu_absen' => '2020-04-02 15:24:00'
            ],
            [
                'id_jadwal_ajar' => 6,
                'id_pemesanan' => 1,
                'waktu_absen' => '2020-04-05 15:24:00'
            ],
            [
                'id_jadwal_ajar' => 7,
                'id_pemesanan' => 1,
                'waktu_absen' => '2020-04-09 15:24:00'
            ],
            [
                'id_jadwal_ajar' => 8,
                'id_pemesanan' => 1,
                'waktu_absen' => '2020-04-12 15:24:00'
            ],
            [
                'id_jadwal_ajar' => 9,
                'id_pemesanan' => 1,
                'waktu_absen' => '2020-04-16 15:24:00'
            ],
            [
                'id_jadwal_ajar' => 10,
                'id_pemesanan' => 1,
                'waktu_absen' => '2020-04-19 15:24:00'
            ],
            [
                'id_jadwal_ajar' => 11,
                'id_pemesanan' => 1,
                'waktu_absen' => '2020-04-23 15:24:00'
            ],
            [
                'id_jadwal_ajar' => 12,
                'id_pemesanan' => 1,
                'waktu_absen' => '2020-04-26 15:24:00'
            ]
        ];

        Absen::insert($data);
    }
}
