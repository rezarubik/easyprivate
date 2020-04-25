<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Jenjang;

class JenjangSeeder extends Seeder
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
                'nama_jenjang' => 'SD',
                'harga_per_pertemuan' => 120000,
                'upah_guru_per_pertemuan' => 90000
            ],
            [
                'nama_jenjang' => 'SMP',
                'harga_per_pertemuan' => 170000,
                'upah_guru_per_pertemuan' => 140000
            ],
            [
                'nama_jenjang' => 'SMA',
                'harga_per_pertemuan' => 200000,
                'upah_guru_per_pertemuan' => 170000
            ]
        ];

        Jenjang::insert($data);
    }
}
