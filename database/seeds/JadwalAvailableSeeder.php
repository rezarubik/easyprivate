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
                'end' => '10:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Senin',
                'start' => '11:00',
                'end' => '12:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Senin',
                'start' => '13:00',
                'end' => '14:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Senin',
                'start' => '15:00',
                'end' => '16:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Senin',
                'start' => '17:00',
                'end' => '18:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Senin',
                'start' => '19:00',
                'end' => '20:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Selasa',
                'start' => '09:00',
                'end' => '10:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Selasa',
                'start' => '11:00',
                'end' => '12:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Selasa',
                'start' => '13:00',
                'end' => '14:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Rabu',
                'start' => '09:00',
                'end' => '10:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Rabu',
                'start' => '11:00',
                'end' => '12:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Rabu',
                'start' => '13:00',
                'end' => '14:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Rabu',
                'start' => '15:00',
                'end' => '16:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Rabu',
                'start' => '17:00',
                'end' => '18:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Rabu',
                'start' => '19:00',
                'end' => '20:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Kamis',
                'start' => '09:00',
                'end' => '10:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Kamis',
                'start' => '11:00',
                'end' => '12:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Kamis',
                'start' => '13:00',
                'end' => '14:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Kamis',
                'start' => '15:00',
                'end' => '16:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Kamis',
                'start' => '17:00',
                'end' => '18:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Kamis',
                'start' => '19:00',
                'end' => '20:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Jumat',
                'start' => '09:00',
                'end' => '10:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Jumat',
                'start' => '11:00',
                'end' => '12:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Jumat',
                'start' => '13:00',
                'end' => '14:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Jumat',
                'start' => '15:00',
                'end' => '16:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Jumat',
                'start' => '17:00',
                'end' => '18:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Jumat',
                'start' => '19:00',
                'end' => '20:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Sabtu',
                'start' => '09:00',
                'end' => '10:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Sabtu',
                'start' => '11:00',
                'end' => '12:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Sabtu',
                'start' => '13:00',
                'end' => '14:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Sabtu',
                'start' => '15:00',
                'end' => '16:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Sabtu',
                'start' => '17:00',
                'end' => '18:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Sabtu',
                'start' => '19:00',
                'end' => '20:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Minggu',
                'start' => '09:00',
                'end' => '10:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Minggu',
                'start' => '11:00',
                'end' => '12:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Minggu',
                'start' => '13:00',
                'end' => '14:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Minggu',
                'start' => '15:00',
                'end' => '16:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Minggu',
                'start' => '17:00',
                'end' => '18:30',
                'available' => 1
            ],
            [
                'id_user' => 3,
                'hari' => 'Minggu',
                'start' => '19:00',
                'end' => '20:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Senin',
                'start' => '09:00',
                'end' => '10:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Senin',
                'start' => '11:00',
                'end' => '12:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Senin',
                'start' => '13:00',
                'end' => '14:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Senin',
                'start' => '15:00',
                'end' => '16:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Senin',
                'start' => '17:00',
                'end' => '18:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Senin',
                'start' => '19:00',
                'end' => '20:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Selasa',
                'start' => '09:00',
                'end' => '10:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Selasa',
                'start' => '11:00',
                'end' => '12:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Selasa',
                'start' => '13:00',
                'end' => '14:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Rabu',
                'start' => '09:00',
                'end' => '10:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Rabu',
                'start' => '11:00',
                'end' => '12:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Rabu',
                'start' => '13:00',
                'end' => '14:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Rabu',
                'start' => '15:00',
                'end' => '16:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Rabu',
                'start' => '17:00',
                'end' => '18:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Rabu',
                'start' => '19:00',
                'end' => '20:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Kamis',
                'start' => '09:00',
                'end' => '10:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Kamis',
                'start' => '11:00',
                'end' => '12:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Kamis',
                'start' => '13:00',
                'end' => '14:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Kamis',
                'start' => '15:00',
                'end' => '16:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Kamis',
                'start' => '17:00',
                'end' => '18:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Kamis',
                'start' => '19:00',
                'end' => '20:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Jumat',
                'start' => '09:00',
                'end' => '10:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Jumat',
                'start' => '11:00',
                'end' => '12:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Jumat',
                'start' => '13:00',
                'end' => '14:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Jumat',
                'start' => '15:00',
                'end' => '16:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Jumat',
                'start' => '17:00',
                'end' => '18:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Jumat',
                'start' => '19:00',
                'end' => '20:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Sabtu',
                'start' => '09:00',
                'end' => '10:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Sabtu',
                'start' => '11:00',
                'end' => '12:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Sabtu',
                'start' => '13:00',
                'end' => '14:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Sabtu',
                'start' => '15:00',
                'end' => '16:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Sabtu',
                'start' => '17:00',
                'end' => '18:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Sabtu',
                'start' => '19:00',
                'end' => '20:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Minggu',
                'start' => '09:00',
                'end' => '10:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Minggu',
                'start' => '11:00',
                'end' => '12:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Minggu',
                'start' => '13:00',
                'end' => '14:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Minggu',
                'start' => '15:00',
                'end' => '16:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Minggu',
                'start' => '17:00',
                'end' => '18:30',
                'available' => 1
            ],
            [
                'id_user' => 5,
                'hari' => 'Minggu',
                'start' => '19:00',
                'end' => '20:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Senin',
                'start' => '09:00',
                'end' => '10:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Senin',
                'start' => '11:00',
                'end' => '12:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Senin',
                'start' => '13:00',
                'end' => '14:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Senin',
                'start' => '15:00',
                'end' => '16:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Senin',
                'start' => '17:00',
                'end' => '18:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Senin',
                'start' => '19:00',
                'end' => '20:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Selasa',
                'start' => '09:00',
                'end' => '10:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Selasa',
                'start' => '11:00',
                'end' => '12:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Selasa',
                'start' => '13:00',
                'end' => '14:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Rabu',
                'start' => '09:00',
                'end' => '10:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Rabu',
                'start' => '11:00',
                'end' => '12:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Rabu',
                'start' => '13:00',
                'end' => '14:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Rabu',
                'start' => '15:00',
                'end' => '16:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Rabu',
                'start' => '17:00',
                'end' => '18:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Rabu',
                'start' => '19:00',
                'end' => '20:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Kamis',
                'start' => '09:00',
                'end' => '10:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Kamis',
                'start' => '11:00',
                'end' => '12:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Kamis',
                'start' => '13:00',
                'end' => '14:30',
                'available' => 2
            ],
            [
                'id_user' => 6,
                'hari' => 'Kamis',
                'start' => '15:00',
                'end' => '16:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Kamis',
                'start' => '17:00',
                'end' => '18:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Kamis',
                'start' => '19:00',
                'end' => '20:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Jumat',
                'start' => '09:00',
                'end' => '10:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Jumat',
                'start' => '11:00',
                'end' => '12:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Jumat',
                'start' => '13:00',
                'end' => '14:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Jumat',
                'start' => '15:00',
                'end' => '16:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Jumat',
                'start' => '17:00',
                'end' => '18:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Jumat',
                'start' => '19:00',
                'end' => '20:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Sabtu',
                'start' => '09:00',
                'end' => '10:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Sabtu',
                'start' => '11:00',
                'end' => '12:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Sabtu',
                'start' => '13:00',
                'end' => '14:30',
                'available' => 2
            ],
            [
                'id_user' => 6,
                'hari' => 'Sabtu',
                'start' => '15:00',
                'end' => '16:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Sabtu',
                'start' => '17:00',
                'end' => '18:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Sabtu',
                'start' => '19:00',
                'end' => '20:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Minggu',
                'start' => '09:00',
                'end' => '10:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Minggu',
                'start' => '11:00',
                'end' => '12:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Minggu',
                'start' => '13:00',
                'end' => '14:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Minggu',
                'start' => '15:00',
                'end' => '16:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Minggu',
                'start' => '17:00',
                'end' => '18:30',
                'available' => 1
            ],
            [
                'id_user' => 6,
                'hari' => 'Minggu',
                'start' => '19:00',
                'end' => '20:30',
                'available' => 1
            ],
        ];

        JadwalAvailable::insert($data);
    }
}
