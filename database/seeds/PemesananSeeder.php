<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Pemesanan;

class PemesananSeeder extends Seeder
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
                'id_guru' => 6,
                'id_murid' => 2,
                'id_mapel' => 1,
                'waktu_pemesanan' => '2020-03-16 12:04:21',
                'kelas' => 5,
                'status' => 1,
                'jumlah_pertemuan' => 12
            ],
            [
                'id_guru' => 6,
                'id_murid' => 2,
                'id_mapel' => 2,
                'waktu_pemesanan' => '2020-04-20 10:19:10',
                'kelas' => 5,
                'status' => 0,
                'jumlah_pertemuan' => 0
            ],
            [
                'id_guru' => 6,
                'id_murid' => 2,
                'id_mapel' => 2,
                'waktu_pemesanan' => '2020-04-04 19:45:24',
                'kelas' => 5,
                'status' => 3,
                'jumlah_pertemuan' => 2
            ],
            [
                'id_guru' => 6,
                'id_murid' => 4,
                'id_mapel' => 3,
                'waktu_pemesanan' => '2020-04-01 13:42:14',
                'kelas' => 1,
                'status' => 2,
                'jumlah_pertemuan' => 0
            ],
            // new SMP
            [
                'id_guru' => 3,
                'id_murid' => 4,
                'id_mapel' => 14,
                'waktu_pemesanan' => '2020-04-01 13:42:14',
                'kelas' => 8,
                'status' => 2,
                'jumlah_pertemuan' => 1
            ],
            [
                'id_guru' => 5,
                'id_murid' => 4,
                'id_mapel' => 17,
                'waktu_pemesanan' => '2020-04-01 13:42:14',
                'kelas' => 7,
                'status' => 2,
                'jumlah_pertemuan' => 2
            ],
            // new SMA
            [
                'id_guru' => 5,
                'id_murid' => 4,
                'id_mapel' => 22,
                'waktu_pemesanan' => '2020-04-01 13:42:14',
                'kelas' => 10,
                'status' => 2,
                'jumlah_pertemuan' => 3
            ],
            [
                'id_guru' => 3,
                'id_murid' => 4,
                'id_mapel' => 24,
                'waktu_pemesanan' => '2020-04-01 13:42:14',
                'kelas' => 11,
                'status' => 2,
                'jumlah_pertemuan' => 4
            ],
        ];

        Pemesanan::insert($data);
    }
}
