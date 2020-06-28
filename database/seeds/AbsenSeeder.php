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
                'id_jadwal_pemesanan_perminggu' => 2,
                'id_jadwal_pengganti' => null,
                'id_pembayaran' => null,
                'id_upah_guru' => null,
                'id_pemesanan' => 1,
                'waktu_absen' => '2020-03-19 15:24:00'
            ],
            [
                'id_jadwal_pemesanan_perminggu' => 1,
                'id_jadwal_pengganti' => null,
                'id_pembayaran' => null,
                'id_upah_guru' => null,
                'id_pemesanan' => 1,
                'waktu_absen' => '2020-03-22 15:24:00'
            ],
            [
                'id_jadwal_pemesanan_perminggu' => 2,
                'id_jadwal_pengganti' => null,
                'id_pembayaran' => null,
                'id_upah_guru' => null,
                'id_pemesanan' => 1,
                'waktu_absen' => '2020-03-26 15:24:00'
            ],
            [
                'id_jadwal_pemesanan_perminggu' => 1,
                'id_jadwal_pengganti' => null,
                'id_pembayaran' => null,
                'id_upah_guru' => null,
                'id_pemesanan' => 1,
                'waktu_absen' => '2020-03-29 15:24:00'
            ],
            [
                'id_jadwal_pemesanan_perminggu' => 2,
                'id_jadwal_pengganti' => null,
                'id_pembayaran' => null,
                'id_upah_guru' => null,
                'id_pemesanan' => 1,
                'waktu_absen' => '2020-04-02 15:24:00'
            ],
            [
                'id_jadwal_pemesanan_perminggu' => 1,
                'id_jadwal_pengganti' => null,
                'id_pembayaran' => null,
                'id_upah_guru' => null,
                'id_pemesanan' => 1,
                'waktu_absen' => '2020-04-05 15:24:00'
            ],
            [
                'id_jadwal_pemesanan_perminggu' => 2,
                'id_jadwal_pengganti' => null,
                'id_pembayaran' => null,
                'id_upah_guru' => null,
                'id_pemesanan' => 1,
                'waktu_absen' => '2020-04-09 15:24:00'
            ],
            [
                'id_jadwal_pemesanan_perminggu' => 1,
                'id_jadwal_pengganti' => null,
                'id_pembayaran' => null,
                'id_upah_guru' => null,
                'id_pemesanan' => 1,
                'waktu_absen' => '2020-04-12 15:24:00'
            ],
            [
                'id_jadwal_pemesanan_perminggu' => 2,
                'id_jadwal_pengganti' => null,
                'id_pembayaran' => null,
                'id_upah_guru' => null,
                'id_pemesanan' => 1,
                'waktu_absen' => '2020-04-16 15:24:00'
            ],
            [
                'id_jadwal_pemesanan_perminggu' => 1,
                'id_jadwal_pengganti' => null,
                'id_pembayaran' => null,
                'id_upah_guru' => null,
                'id_pemesanan' => 1,
                'waktu_absen' => '2020-04-19 15:24:00'
            ],
            [
                'id_jadwal_pemesanan_perminggu' => 4,
                'id_jadwal_pengganti' => null,
                'id_pembayaran' => null,
                'id_upah_guru' => null,
                'id_pemesanan' => 3,
                'waktu_absen' => '2020-04-21 14:55:00'
            ],
            [
                'id_jadwal_pemesanan_perminggu' => 2,
                'id_jadwal_pengganti' => null,
                'id_pembayaran' => null,
                'id_upah_guru' => null,
                'id_pemesanan' => 1,
                'waktu_absen' => '2020-04-23 15:24:00'
            ],
            [
                'id_jadwal_pemesanan_perminggu' => 4,
                'id_jadwal_pengganti' => null,
                'id_pembayaran' => null,
                'id_upah_guru' => null,
                'id_pemesanan' => 3,
                'waktu_absen' => '2020-04-24 14:59:00'
            ],
            [
                'id_jadwal_pemesanan_perminggu' => 1,
                'id_jadwal_pengganti' => null,
                'id_pembayaran' => null,
                'id_upah_guru' => null,
                'id_pemesanan' => 1,
                'waktu_absen' => '2020-04-26 15:24:00'
            ],
            [
                'id_jadwal_pemesanan_perminggu' => null,
                'id_jadwal_pengganti' => 1,
                'id_pembayaran' => null,
                'id_upah_guru' => null,
                'id_pemesanan' => 1,
                'waktu_absen' => '2020-05-01 15:24:00'
            ],
            [
                'id_jadwal_pemesanan_perminggu' => 6,
                'id_jadwal_pengganti' => null,
                'id_pembayaran' => 1,
                'id_upah_guru' => null,
                'id_pemesanan' => 9,
                'waktu_absen' => '2020-05-15 10:00:00'
            ]
        ];

        Absen::insert($data);
    }
}
