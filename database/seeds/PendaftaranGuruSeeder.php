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
                'id_season' => 1,
                'universitas' => 'Universitas Indonesia',
                'pengalaman_mengajar' => 25,
                'nilai_ipk' => 3.40,
                'status' => 1
            ],
            [
                'id_user' => 5,
                'id_season' => 1,
                'universitas' => 'Universitas Indonesia',
                'pengalaman_mengajar' => 26,
                'nilai_ipk' => 3.45,
                'status' => 1
            ],
            [
                'id_user' => 6,
                'id_season' => 1,
                'universitas' => 'Universitas Indonesia',
                'pengalaman_mengajar' => 14,
                'nilai_ipk' => 3.49,
                'status' => 1
            ],
            [
                'id_user' => 1,
                'id_season' => 1,
                'universitas' => 'Universitas Indonesia',
                'pengalaman_mengajar' => 25,
                'nilai_ipk' => 3.20,
                'status' => 1
            ],
            [
                'id_user' => 7,
                'id_season' => 1,
                'universitas' => 'Universitas Indonesia',
                'pengalaman_mengajar' => 25,
                'nilai_ipk' => 3.15,
                'status' => 0
            ],
            [
                'id_user' => 8,
                'id_season' => 1,
                'universitas' => 'Universitas Indonesia',
                'pengalaman_mengajar' => 25,
                'nilai_ipk' => 3.26,
                'status' => 0
            ],
            [
                'id_user' => 9,
                'id_season' => 1,
                'universitas' => 'Universitas Indonesia',
                'pengalaman_mengajar' => 25,
                'nilai_ipk' => 3.47,
                'status' => 0
            ],
            [
                'id_user' => 10,
                'id_season' => 1,
                'universitas' => 'Universitas Indonesia',
                'pengalaman_mengajar' => 25,
                'nilai_ipk' => 3.49,
                'status' => 0
            ],
            [
                'id_user' => 11,
                'id_season' => 1,
                'universitas' => 'Universitas Indonesia',
                'pengalaman_mengajar' => 25,
                'nilai_ipk' => 3.42,
                'status' => 0
            ],
            [
                'id_user' => 12,
                'id_season' => 1,
                'universitas' => 'Universitas Indonesia',
                'pengalaman_mengajar' => 25,
                'nilai_ipk' => 3.30,
                'status' => 0
            ],
            [
                'id_user' => 13,
                'id_season' => 1,
                'universitas' => 'Universitas Indonesia',
                'pengalaman_mengajar' => 25,
                'nilai_ipk' => 3.30,
                'status' => 0
            ],
            [
                'id_user' => 14,
                'id_season' => 1,
                'universitas' => 'Universitas Indonesia',
                'pengalaman_mengajar' => 25,
                'nilai_ipk' => 3.40,
                'status' => 0
            ],
            [
                'id_user' => 15,
                'id_season' => 1,
                'universitas' => 'Universitas Indonesia',
                'pengalaman_mengajar' => 25,
                'nilai_ipk' => 3.45,
                'status' => 0
            ],
            [
                'id_user' => 16,
                'id_season' => 1,
                'universitas' => 'Universitas Indonesia',
                'pengalaman_mengajar' => 25,
                'nilai_ipk' => 3.25,
                'status' => 0
            ],
            [
                'id_user' => 17,
                'id_season' => 1,
                'universitas' => 'Universitas Indonesia',
                'pengalaman_mengajar' => 25,
                'nilai_ipk' => 3.40,
                'status' => 0
            ],
            [
                'id_user' => 18,
                'id_season' => 1,
                'universitas' => 'Universitas Indonesia',
                'pengalaman_mengajar' => 25,
                'nilai_ipk' => 3.40,
                'status' => 0
            ],
            [
                'id_user' => 19,
                'id_season' => 1,
                'universitas' => 'Universitas Indonesia',
                'pengalaman_mengajar' => 25,
                'nilai_ipk' => 3.40,
                'status' => 0
            ],
            [
                'id_user' => 20,
                'id_season' => 1,
                'universitas' => 'Universitas Indonesia',
                'pengalaman_mengajar' => 25,
                'nilai_ipk' => 3.40,
                'status' => 0
            ],
            [
                'id_user' => 21,
                'id_season' => 1,
                'universitas' => 'Universitas Indonesia',
                'pengalaman_mengajar' => 25,
                'nilai_ipk' => 3.39,
                'status' => 0
            ],
            [
                'id_user' => 22,
                'id_season' => 1,
                'universitas' => 'Universitas Indonesia',
                'pengalaman_mengajar' => 25,
                'nilai_ipk' => 3.47,
                'status' => 0
            ]
        ];

        PendaftaranGuru::insert($data);
    }
}
