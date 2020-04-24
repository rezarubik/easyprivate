<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\JadwalAjar;

class JadwalAjarSeeder extends Seeder
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
                'waktu_ajar' => '2020-03-19 14:00:00'
            ],
            [
                'id_pemesanan' => 1,
                'waktu_ajar' => '2020-03-22 14:00:00'
            ],
            [
                'id_pemesanan' => 1,
                'waktu_ajar' => '2020-03-26 14:00:00'
            ],
            [
                'id_pemesanan' => 1,
                'waktu_ajar' => '2020-03-29 14:00:00'
            ],
            [
                'id_pemesanan' => 1,
                'waktu_ajar' => '2020-04-02 14:00:00'
            ],
            [
                'id_pemesanan' => 1,
                'waktu_ajar' => '2020-04-05 14:00:00'
            ],
            [
                'id_pemesanan' => 1,
                'waktu_ajar' => '2020-04-09 14:00:00'
            ],
            [
                'id_pemesanan' => 1,
                'waktu_ajar' => '2020-04-12 14:00:00'
            ],
            [
                'id_pemesanan' => 1,
                'waktu_ajar' => '2020-04-16 14:00:00'
            ],
            [
                'id_pemesanan' => 1,
                'waktu_ajar' => '2020-04-19 14:00:00'
            ],
            [
                'id_pemesanan' => 3,
                'waktu_ajar' => '2020-04-21 13:30:00'
            ],
            [
                'id_pemesanan' => 1,
                'waktu_ajar' => '2020-04-23 14:00:00'
            ],
            [
                'id_pemesanan' => 3,
                'waktu_ajar' => '2020-04-24 13:30:00'
            ],
            [
                'id_pemesanan' => 1,
                'waktu_ajar' => '2020-04-26 14:00:00'
            ]
        ];

        JadwalAjar::insert($data);
    }
}
