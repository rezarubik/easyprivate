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
            ]
        ];

        GuruMapel::insert($data);
    }
}
