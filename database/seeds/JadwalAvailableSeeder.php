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
                'start' => '09:00',
                'end' => '12:00',
                'available' => 0
            ],
            [
                'id_user' => 3,
                'hari' => 'Senin',
                'start' => '12:01',
                'end' => '15:00',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Senin',
                'start' => '15:01',
                'end' => '18:00',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Senin',
                'start' => '18:01',
                'end' => '21:00',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Selasa',
                'start' => '09:00',
                'end' => '12:00',
                'available' => 0
            ],
            [
                'id_user' => 3,
                'hari' => 'Selasa',
                'start' => '12:01',
                'end' => '15:00',
                'available' => 0
            ],
            [
                'id_user' => 3,
                'hari' => 'Selasa',
                'start' => '15:01',
                'end' => '18:00',
                'available' => 0
            ],
            [
                'id_user' => 3,
                'hari' => 'Selasa',
                'start' => '18:01',
                'end' => '21:00',
                'available' => 0
            ],
            [
                'id_user' => 3,
                'hari' => 'Rabu',
                'start' => '09:00',
                'end' => '12:00',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Rabu',
                'start' => '12:01',
                'end' => '15:00',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Rabu',
                'start' => '15:01',
                'end' => '18:00',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Rabu',
                'start' => '18:01',
                'end' => '21:00',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Kamis',
                'start' => '09:00',
                'end' => '12:00',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Kamis',
                'start' => '12:01',
                'end' => '15:00',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Kamis',
                'start' => '15:01',
                'end' => '18:00',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Kamis',
                'start' => '18:01',
                'end' => '21:00',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Jumat',
                'start' => '09:00',
                'end' => '12:00',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Jumat',
                'start' => '12:01',
                'end' => '15:00',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Jumat',
                'start' => '15:01',
                'end' => '18:00',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Jumat',
                'start' => '18:01',
                'end' => '21:00',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Sabtu',
                'start' => '09:00',
                'end' => '12:00',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Sabtu',
                'start' => '12:01',
                'end' => '15:00',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Sabtu',
                'start' => '15:01',
                'end' => '18:00',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Sabtu',
                'start' => '18:01',
                'end' => '21:00',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Minggu',
                'start' => '09:00',
                'end' => '12:00',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Minggu',
                'start' => '12:01',
                'end' => '15:00',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Minggu',
                'start' => '15:01',
                'end' => '18:00',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Minggu',
                'start' => '18:01',
                'end' => '21:00',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Senin',
                'start' => '09:00',
                'end' => '12:00',
                'available' => 0
            ],
            [
                'id_user' => 5,
                'hari' => 'Senin',
                'start' => '12:01',
                'end' => '15:00',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Senin',
                'start' => '15:01',
                'end' => '18:00',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Senin',
                'start' => '18:01',
                'end' => '21:00',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Selasa',
                'start' => '09:00',
                'end' => '12:00',
                'available' => 0
            ],
            [
                'id_user' => 5,
                'hari' => 'Selasa',
                'start' => '12:01',
                'end' => '15:00',
                'available' => 0
            ],
            [
                'id_user' => 5,
                'hari' => 'Selasa',
                'start' => '15:01',
                'end' => '18:00',
                'available' => 0
            ],
            [
                'id_user' => 5,
                'hari' => 'Selasa',
                'start' => '18:01',
                'end' => '21:00',
                'available' => 0
            ],
            [
                'id_user' => 5,
                'hari' => 'Rabu',
                'start' => '09:00',
                'end' => '12:00',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Rabu',
                'start' => '12:01',
                'end' => '15:00',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Rabu',
                'start' => '15:01',
                'end' => '18:00',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Rabu',
                'start' => '18:01',
                'end' => '21:00',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Kamis',
                'start' => '09:00',
                'end' => '12:00',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Kamis',
                'start' => '12:01',
                'end' => '15:00',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Kamis',
                'start' => '15:01',
                'end' => '18:00',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Kamis',
                'start' => '18:01',
                'end' => '21:00',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Jumat',
                'start' => '09:00',
                'end' => '12:00',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Jumat',
                'start' => '12:01',
                'end' => '15:00',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Jumat',
                'start' => '15:01',
                'end' => '18:00',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Jumat',
                'start' => '18:01',
                'end' => '21:00',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Sabtu',
                'start' => '09:00',
                'end' => '12:00',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Sabtu',
                'start' => '12:01',
                'end' => '15:00',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Sabtu',
                'start' => '15:01',
                'end' => '18:00',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Sabtu',
                'start' => '18:01',
                'end' => '21:00',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Minggu',
                'start' => '09:00',
                'end' => '12:00',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Minggu',
                'start' => '12:01',
                'end' => '15:00',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Minggu',
                'start' => '15:01',
                'end' => '18:00',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Minggu',
                'start' => '18:01',
                'end' => '21:00',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Senin',
                'start' => '09:00',
                'end' => '12:00',
                'available' => 0
            ],
            [
                'id_user' => 6,
                'hari' => 'Senin',
                'start' => '12:01',
                'end' => '15:00',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Senin',
                'start' => '15:01',
                'end' => '18:00',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Senin',
                'start' => '18:01',
                'end' => '21:00',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Selasa',
                'start' => '09:00',
                'end' => '12:00',
                'available' => 0
            ],
            [
                'id_user' => 6,
                'hari' => 'Selasa',
                'start' => '12:01',
                'end' => '15:00',
                'available' => 0
            ],
            [
                'id_user' => 6,
                'hari' => 'Selasa',
                'start' => '15:01',
                'end' => '18:00',
                'available' => 0
            ],
            [
                'id_user' => 6,
                'hari' => 'Selasa',
                'start' => '18:01',
                'end' => '21:00',
                'available' => 0
            ],
            [
                'id_user' => 6,
                'hari' => 'Rabu',
                'start' => '09:00',
                'end' => '12:00',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Rabu',
                'start' => '12:01',
                'end' => '15:00',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Rabu',
                'start' => '15:01',
                'end' => '18:00',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Rabu',
                'start' => '18:01',
                'end' => '21:00',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Kamis',
                'start' => '09:00',
                'end' => '12:00',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Kamis',
                'start' => '12:01',
                'end' => '15:00',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Kamis',
                'start' => '15:01',
                'end' => '18:00',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Kamis',
                'start' => '18:01',
                'end' => '21:00',
                'available' => 2
            ],
            [
                'id_user' => 6,
                'hari' => 'Jumat',
                'start' => '09:00',
                'end' => '12:00',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Jumat',
                'start' => '12:01',
                'end' => '15:00',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Jumat',
                'start' => '15:01',
                'end' => '18:00',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Jumat',
                'start' => '18:01',
                'end' => '21:00',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Sabtu',
                'start' => '09:00',
                'end' => '12:00',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Sabtu',
                'start' => '12:01',
                'end' => '15:00',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Sabtu',
                'start' => '15:01',
                'end' => '18:00',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Sabtu',
                'start' => '18:01',
                'end' => '21:00',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Minggu',
                'start' => '09:00',
                'end' => '12:00',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Minggu',
                'start' => '12:01',
                'end' => '15:00',
                'available' => 2
            ],
            [
                'id_user' => 6,
                'hari' => 'Minggu',
                'start' => '15:01',
                'end' => '18:00',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Minggu',
                'start' => '18:01',
                'end' => '21:00',
                'available' => 1
            ]
        ];

        JadwalAvailable::insert($data);
    }
}
