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
                'pm_km' => 5
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
                'pm_km' => 5
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
                'pm_km' => 5
            ]
        ];

        ProfileMatching::insert($data);
    }
}
