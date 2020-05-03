<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\GuruMapel;

class GuruMapelSeeder extends Seeder
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
                'id_guru' => 3,
                'id_mapel' => 22,
            ],
            [
                'id_guru' => 3,
                'id_mapel' => 19
            ],
            [
                'id_guru' => 3,
                'id_mapel' => 20
            ],
            [
                'id_guru' => 5,
                'id_mapel' => 11
            ],
            [
                'id_guru' => 5,
                'id_mapel' => 24
            ],
            [
                'id_guru' => 5,
                'id_mapel' => 30
            ],
            [
                'id_guru' => 6,
                'id_mapel' => 1
            ],
            [
                'id_guru' => 6,
                'id_mapel' => 2
            ],
            [
                'id_guru' => 6,
                'id_mapel' => 3
            ],
            [
                'id_guru' => 7,
                'id_mapel' => 42
            ],
            [
                'id_guru' => 8,
                'id_mapel' => 39
            ],
            [
                'id_guru' => 9,
                'id_mapel' => 24
            ],
            [
                'id_guru' => 10,
                'id_mapel' => 42
            ],
            [
                'id_guru' => 11,
                'id_mapel' => 35
            ],
            [
                'id_guru' => 12,
                'id_mapel' => 40
            ],
            [
                'id_guru' => 13,
                'id_mapel' => 34
            ],
            [
                'id_guru' => 14,
                'id_mapel' => 33
            ],
            [
                'id_guru' => 15,
                'id_mapel' => 30
            ],
            [
                'id_guru' => 16,
                'id_mapel' => 42
            ],
            [
                'id_guru' => 17,
                'id_mapel' => 31
            ],
            [
                'id_guru' => 18,
                'id_mapel' => 19
            ],
            [
                'id_guru' => 19,
                'id_mapel' => 20
            ],
            [
                'id_guru' => 20,
                'id_mapel' => 15
            ],
            [
                'id_guru' => 21,
                'id_mapel' => 32
            ],
            [
                'id_guru' => 22,
                'id_mapel' => 9
            ]
        ];

        GuruMapel::insert($data);
    }
}
