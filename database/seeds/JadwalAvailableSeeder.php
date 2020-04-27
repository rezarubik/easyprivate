<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\JadwalAvailable;

class JadwalAvailableSeeder extends Seeder
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
                'hari' => 'Senin',
                'start' => '08:00',
                'end' => '13:00',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Selasa',
                'start' => '09:00',
                'end' => '16:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Rabu',
                'start' => '16:00',
                'end' => '20:00',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Jumat',
                'start' => '16:00',
                'end' => '20:00',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Sabtu',
                'start' => '09:00',
                'end' => '18:00',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Minggu',
                'start' => '09:00',
                'end' => '18:00',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Kamis',
                'start' => '09:00',
                'end' => '20:00',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Jumat',
                'start' => '13:00',
                'end' => '18:00',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Sabtu',
                'start' => '09:00',
                'end' => '18:00',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Minggu',
                'start' => '09:00',
                'end' => '18:00',
                'available' => 1
            ]
        ];

        JadwalAvailable::insert($data);
    }
}
