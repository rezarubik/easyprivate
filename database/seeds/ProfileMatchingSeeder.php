<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\ProfileMatching;

class ProfileMatchingSeeder extends Seeder
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
                'id_pendaftaran_guru' => 1,
                'pm_pk' => 5,
                'pm_vas' => 5,
                'pm_kk' => 4,
                'pm_cm' => 4,
                'pm_pemat' => 4,
                'pm_ipk' => 4,
                'pm_usia' => 5,
                'pm_km' => 5,
                'pm_result' => 4.45
            ],
            [
                'id_pendaftaran_guru' => 2,
                'pm_pk' => 5,
                'pm_vas' => 3,
                'pm_kk' => 5,
                'pm_cm' => 5,
                'pm_pemat' => 4,
                'pm_ipk' => 4,
                'pm_usia' => 5,
                'pm_km' => 5,
                'pm_result' => 3.89
            ],
            [
                'id_pendaftaran_guru' => 3,
                'pm_pk' => 3,
                'pm_vas' => 4,
                'pm_kk' => 3,
                'pm_cm' => 2,
                'pm_pemat' => 4,
                'pm_ipk' => 4,
                'pm_usia' => 5,
                'pm_km' => 5,
                'pm_result' => 4.24
            ],
            [
                'id_pendaftaran_guru' => 4,
                'pm_pk' => 4,
                'pm_vas' => 1,
                'pm_kk' => 3,
                'pm_cm' => 5,
                'pm_pemat' => 1,
                'pm_ipk' => 4,
                'pm_usia' => 5,
                'pm_km' => 3,
                'pm_result' => null
            ],
            [
                'id_pendaftaran_guru' => 5,
                'pm_pk' => 1,
                'pm_vas' => 2,
                'pm_kk' => 3,
                'pm_cm' => 4,
                'pm_pemat' => 5,
                'pm_ipk' => 1,
                'pm_usia' => 5,
                'pm_km' => 3,
                'pm_result' => null
            ],
            [
                'id_pendaftaran_guru' => 6,
                'pm_pk' => 2,
                'pm_vas' => 3,
                'pm_kk' => 4,
                'pm_cm' => 5,
                'pm_pemat' => 1,
                'pm_ipk' => 2,
                'pm_usia' => 5,
                'pm_km' => 4,
                'pm_result' => null
            ],
            [
                'id_pendaftaran_guru' => 7,
                'pm_pk' => 4,
                'pm_vas' => 1,
                'pm_kk' => 3,
                'pm_cm' => 5,
                'pm_pemat' => 1,
                'pm_ipk' => 4,
                'pm_usia' => 5,
                'pm_km' => 3,
                'pm_result' => null
            ],
            [
                'id_pendaftaran_guru' => 8,
                'pm_pk' => 5,
                'pm_vas' => 1,
                'pm_kk' => 2,
                'pm_cm' => 3,
                'pm_pemat' => 4,
                'pm_ipk' => 5,
                'pm_usia' => 5,
                'pm_km' => 2,
                'pm_result' => null
            ],
            [
                'id_pendaftaran_guru' => 9,
                'pm_pk' => 1,
                'pm_vas' => 2,
                'pm_kk' => 3,
                'pm_cm' => 4,
                'pm_pemat' => 5,
                'pm_ipk' => 1,
                'pm_usia' => 5,
                'pm_km' => 3,
                'pm_result' => null
            ],
            [
                'id_pendaftaran_guru' => 10,
                'pm_pk' => 2,
                'pm_vas' => 3,
                'pm_kk' => 4,
                'pm_cm' => 5,
                'pm_pemat' => 1,
                'pm_ipk' => 2,
                'pm_usia' => 5,
                'pm_km' => 4,
                'pm_result' => null
            ],
            [
                'id_pendaftaran_guru' => 11,
                'pm_pk' => 4,
                'pm_vas' => 1,
                'pm_kk' => 3,
                'pm_cm' => 5,
                'pm_pemat' => 1,
                'pm_ipk' => 4,
                'pm_usia' => 5,
                'pm_km' => 3,
                'pm_result' => null
            ],
            [
                'id_pendaftaran_guru' => 12,
                'pm_pk' => 5,
                'pm_vas' => 1,
                'pm_kk' => 2,
                'pm_cm' => 3,
                'pm_pemat' => 4,
                'pm_ipk' => 5,
                'pm_usia' => 5,
                'pm_km' => 2,
                'pm_result' => null
            ],
            [
                'id_pendaftaran_guru' => 13,
                'pm_pk' => 1,
                'pm_vas' => 2,
                'pm_kk' => 3,
                'pm_cm' => 4,
                'pm_pemat' => 5,
                'pm_ipk' => 1,
                'pm_usia' => 5,
                'pm_km' => 3,
                'pm_result' => null
            ],
            [
                'id_pendaftaran_guru' => 14,
                'pm_pk' => 2,
                'pm_vas' => 3,
                'pm_kk' => 4,
                'pm_cm' => 5,
                'pm_pemat' => 1,
                'pm_ipk' => 2,
                'pm_usia' => 5,
                'pm_km' => 4,
                'pm_result' => null
            ],
            [
                'id_pendaftaran_guru' => 15,
                'pm_pk' => 4,
                'pm_vas' => 1,
                'pm_kk' => 3,
                'pm_cm' => 5,
                'pm_pemat' => 1,
                'pm_ipk' => 4,
                'pm_usia' => 5,
                'pm_km' => 3,
                'pm_result' => null
            ],
            [
                'id_pendaftaran_guru' => 16,
                'pm_pk' => 5,
                'pm_vas' => 1,
                'pm_kk' => 2,
                'pm_cm' => 3,
                'pm_pemat' => 4,
                'pm_ipk' => 5,
                'pm_usia' => 5,
                'pm_km' => 2,
                'pm_result' => null
            ],
            [
                'id_pendaftaran_guru' => 17,
                'pm_pk' => 1,
                'pm_vas' => 2,
                'pm_kk' => 3,
                'pm_cm' => 4,
                'pm_pemat' => 5,
                'pm_ipk' => 1,
                'pm_usia' => 5,
                'pm_km' => 3,
                'pm_result' => null
            ],
            [
                'id_pendaftaran_guru' => 18,
                'pm_pk' => 2,
                'pm_vas' => 3,
                'pm_kk' => 4,
                'pm_cm' => 5,
                'pm_pemat' => 1,
                'pm_ipk' => 2,
                'pm_usia' => 5,
                'pm_km' => 4,
                'pm_result' => null
            ],
            [
                'id_pendaftaran_guru' => 19,
                'pm_pk' => 4,
                'pm_vas' => 1,
                'pm_kk' => 3,
                'pm_cm' => 5,
                'pm_pemat' => 1,
                'pm_ipk' => 4,
                'pm_usia' => 5,
                'pm_km' => 3,
                'pm_result' => null
            ],
            [
                'id_pendaftaran_guru' => 20,
                'pm_pk' => 5,
                'pm_vas' => 1,
                'pm_kk' => 2,
                'pm_cm' => 3,
                'pm_pemat' => 4,
                'pm_ipk' => 5,
                'pm_usia' => 5,
                'pm_km' => 2,
                'pm_result' => null
            ]
        ];

        ProfileMatching::insert($data);
    }
}
