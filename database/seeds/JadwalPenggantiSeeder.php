<?php

use Illuminate\Database\Seeder;
use App\JadwalPengganti;

class JadwalPenggantiSeeder extends Seeder
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
                'id_jadwal_pemesanan_perminggu' => 1,
                'waktu_pengganti' => '2020-05-02 15:00:00'
            ]
        ];
        JadwalPengganti::insert($data);
    }
}
