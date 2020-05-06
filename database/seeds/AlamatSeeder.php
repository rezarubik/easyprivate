<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Alamat;

class AlamatSeeder extends Seeder
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
                'id_user' => 1,
                'latitude' => -6.23884,
                'longitude' => 106.912,
                'alamat_lengkap' => 'Jl. Teluk Langsa 4 Blok C.8 No.4'
            ],
            [
                'id_user' => 2,
                'latitude' => -6.539204,
                'longitude' => 106.812582,
                'alamat_lengkap' => 'Vila bogor indah 2 blok dd4 no.19, RT.07/RW.13, Ciparigi'
            ],
            [
                'id_user' => 3,
                'latitude' => -6.419149,
                'longitude' => 106.841026,
                'alamat_lengkap' => 'Jl. Kemang Raya 8'
            ],
            [
                'id_user' => 4,
                'latitude' => -6.317222,
                'longitude' => 106.719349,
                'alamat_lengkap' => 'Jl. Bukit Indah'
            ],
            [
                'id_user' => 5,
                'latitude' => -6.201457,
                'longitude' => 106.815422,
                'alamat_lengkap' => 'Central Jakarta, Karet Tengsin, Tanahabang'
            ],
            [
                'id_user' => 6,
                'latitude' => -6.500221,
                'longitude' => 106.807824,
                'alamat_lengkap' => 'Jl. Beo Raya, Sukahati'
            ],
            [
                'id_user' => 7,
                'latitude' => -6.500221,
                'longitude' => 106.807824,
                'alamat_lengkap' => 'Jl. Beo Raya, Sukahati'
            ],
            [
                'id_user' => 8,
                'latitude' => -6.500221,
                'longitude' => 106.807824,
                'alamat_lengkap' => 'Jl. Beo Raya, Sukahati'
            ],
            [
                'id_user' => 9,
                'latitude' => -6.500221,
                'longitude' => 106.807824,
                'alamat_lengkap' => 'Jl. Beo Raya, Sukahati'
            ],
            [
                'id_user' => 10,
                'latitude' => -6.500221,
                'longitude' => 106.807824,
                'alamat_lengkap' => 'Jl. Beo Raya, Sukahati'
            ],
            [
                'id_user' => 11,
                'latitude' => -6.500221,
                'longitude' => 106.807824,
                'alamat_lengkap' => 'Jl. Beo Raya, Sukahati'
            ],
            [
                'id_user' => 12,
                'latitude' => -6.500221,
                'longitude' => 106.807824,
                'alamat_lengkap' => 'Jl. Beo Raya, Sukahati'
            ],
            [
                'id_user' => 13,
                'latitude' => -6.500221,
                'longitude' => 106.807824,
                'alamat_lengkap' => 'Jl. Beo Raya, Sukahati'
            ],
            [
                'id_user' => 14,
                'latitude' => -6.500221,
                'longitude' => 106.807824,
                'alamat_lengkap' => 'Jl. Beo Raya, Sukahati'
            ],
            [
                'id_user' => 15,
                'latitude' => -6.500221,
                'longitude' => 106.807824,
                'alamat_lengkap' => 'Jl. Beo Raya, Sukahati'
            ],
            [
                'id_user' => 16,
                'latitude' => -6.500221,
                'longitude' => 106.807824,
                'alamat_lengkap' => 'Jl. Beo Raya, Sukahati'
            ],
            [
                'id_user' => 17,
                'latitude' => -6.500221,
                'longitude' => 106.807824,
                'alamat_lengkap' => 'Jl. Beo Raya, Sukahati'
            ],
            [
                'id_user' => 18,
                'latitude' => -6.500221,
                'longitude' => 106.807824,
                'alamat_lengkap' => 'Jl. Beo Raya, Sukahati'
            ],
            [
                'id_user' => 19,
                'latitude' => -6.500221,
                'longitude' => 106.807824,
                'alamat_lengkap' => 'Jl. Beo Raya, Sukahati'
            ],
            [
                'id_user' => 20,
                'latitude' => -6.500221,
                'longitude' => 106.807824,
                'alamat_lengkap' => 'Jl. Beo Raya, Sukahati'
            ],
            [
                'id_user' => 21,
                'latitude' => -6.500221,
                'longitude' => 106.807824,
                'alamat_lengkap' => 'Jl. Beo Raya, Sukahati'
            ],
            [
                'id_user' => 22,
                'latitude' => -6.500221,
                'longitude' => 106.807824,
                'alamat_lengkap' => 'Jl. Beo Raya, Sukahati'
            ]
        ];
        
        Alamat::insert($data);
    }
}
