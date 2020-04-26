<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\MataPelajaran;

class MataPelajaranSeeder extends Seeder
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
                'nama_mapel'=>'IPA SD',
                'id_jenjang'=>1
            ],
            [
                'nama_mapel'=>'IPS SD',
                'id_jenjang'=>1
            ],
            [
                'nama_mapel'=>'BAHASA INGGRIS SD',
                'id_jenjang'=>1
            ],
            [
                'nama_mapel'=>'BAHASA INDONESIA SD',
                'id_jenjang'=>1
            ],
            [
                'nama_mapel'=>'MATEMATIKA SD',
                'id_jenjang'=>1
            ],
            [
                'nama_mapel'=>'BAHASA ARAB SD',
                'id_jenjang'=>1
            ],
            [
                'nama_mapel'=>'KOMPUTER SD',
                'id_jenjang'=>1
            ],
            [
                'nama_mapel'=>'KEWARGANEGARAAN SD',
                'id_jenjang'=>1
            ],
            [
                'nama_mapel'=>'PENGETAHUAN UMUM SD',
                'id_jenjang'=>1
            ],
            [
                'nama_mapel'=>'IPA SMP',
                'id_jenjang'=>2
            ],
            [
                'nama_mapel'=>'IPS SMP',
                'id_jenjang'=>2
            ],
            [
                'nama_mapel'=>'BAHASA INGGRIS SMP',
                'id_jenjang'=>2
            ],
            [
                'nama_mapel'=>'BAHASA INDONESIA SMP',
                'id_jenjang'=>2
            ],
            [
                'nama_mapel'=>'BAHASA ARAB SMP',
                'id_jenjang'=>2
            ],
            [
                'nama_mapel'=>'MATEMATIKA SMP',
                'id_jenjang'=>2
            ],
            [
                'nama_mapel'=>'FISIKA SMP',
                'id_jenjang'=>2
            ],
            [
                'nama_mapel'=>'BIOLOGI SMP',
                'id_jenjang'=>2
            ],
            [
                'nama_mapel'=>'KIMIA SMP',
                'id_jenjang'=>2
            ],
            [
                'nama_mapel'=>'KOMPUTER SMP',
                'id_jenjang'=>2
            ],
            [
                'nama_mapel'=>'KEWARGANEGARAAN SMP',
                'id_jenjang'=>2
            ],
            [
                'nama_mapel'=>'MATEMATIKA IPA SMA',
                'id_jenjang'=>3
            ],
            [
                'nama_mapel'=>'MATEMATIKA IPS SMA',
                'id_jenjang'=>3
            ],
            [
                'nama_mapel'=>'MATEMATIKA SMA',
                'id_jenjang'=>3
            ],
            [
                'nama_mapel'=>'MATEMATIKA FISIKA KIMIA SMA',
                'id_jenjang'=>3
            ],
            [
                'nama_mapel'=>'STATISTIKA SMA',
                'id_jenjang'=>3
            ],
            [
                'nama_mapel'=>'GEOGRAFI SMA',
                'id_jenjang'=>3
            ],
            [
                'nama_mapel'=>'EKONOMI SMA',
                'id_jenjang'=>3
            ],
            [
                'nama_mapel'=>'SOSIOLOGI SMA',
                'id_jenjang'=>3
            ],
            [
                'nama_mapel'=>'AKUNTANSI SMA',
                'id_jenjang'=>3
            ],
            [
                'nama_mapel'=>'ADMINISTRASI PERKANTORAN SMA',
                'id_jenjang'=>3
            ],
            [
                'nama_mapel'=>'FISIKA SMA',
                'id_jenjang'=>3
            ],
            [
                'nama_mapel'=>'BIOLOGI SMA',
                'id_jenjang'=>3
            ],
            [
                'nama_mapel'=>'KIMIA SMA',
                'id_jenjang'=>3
            ],
            [
                'nama_mapel'=>'BAHASA INGGRIS SMA',
                'id_jenjang'=>3
            ],
            [
                'nama_mapel'=>'BAHASA INDONESIA SMA',
                'id_jenjang'=>3
            ],
            [
                'nama_mapel'=>'BAHASA ARAB SMA',
                'id_jenjang'=>3
            ],
            [
                'nama_mapel'=>'BAHASA SPANYOL SMA',
                'id_jenjang'=>3
            ],
            [
                'nama_mapel'=>'BAHASA JEPANG SMA',
                'id_jenjang'=>3
            ],
            [
                'nama_mapel'=>'BAHASA JERMAN SMA',
                'id_jenjang'=>3
            ],
            [
                'nama_mapel'=>'BAHASA PERANCIS SMA',
                'id_jenjang'=>3
            ],
            [
                'nama_mapel'=>'BAHASA MANDARIN SMA',
                'id_jenjang'=>3
            ],
            [
                'nama_mapel'=>'KOMPUTER SMA',
                'id_jenjang'=>3
            ],
            [
                'nama_mapel'=>'KEWARGANEGARAAN SMA',
                'id_jenjang'=>3
            ],
            [
                'nama_mapel'=>'SEJARAH SMA',
                'id_jenjang'=>3
            ]
        ];

        MataPelajaran::insert($data);
    }
}
