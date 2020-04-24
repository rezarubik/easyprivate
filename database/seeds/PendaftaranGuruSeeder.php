<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\PendaftaranGuru;

class PendaftaranGuruSeeder extends Seeder
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
                'id_user' => 3,
                'pm_result' => 4.45,
                'pengalaman_mengajar' => 25,
                'nilai_ipk' => 3.40
            ],
            [
                'id_user' => 5,
                'pm_result' => 3.89,
                'pengalaman_mengajar' => 26,
                'nilai_ipk' => 3.45
            ],
            [
                'id_user' => 6,
                'pm_result' => 4.24,
                'pengalaman_mengajar' => 14,
                'nilai_ipk' => 3.49
            ]
        ];

        PendaftaranGuru::insert();
    }
}
