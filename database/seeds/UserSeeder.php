<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;

class UserSeeder extends Seeder
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
                'avatar' => 'https://lh3.googleusercontent.com/a-/AOh14GiFmPv-D5PpYgTv9BLuiukJyZh7Alo_1ZSyLLFywg',
                'name' => 'Muhammad Reza Pahlevi',
                'email' => 'rezarubik17@gmail.com',
                'jenis_kelamin' => 'laki-laki',
                'tanggal_lahir' => '1996-04-17',
                'no_handphone' => '089501011011',
                'role' => 0,
                'remember_token' => 'qCX7yF91wuD0hhfiTBQXHpODHSPWAYRrnUylViEN5Nebh6KcQunJ8tyzLElK',
                'created_at' => '2020-03-01 16:12:47',
                'updated_at' => '2020-03-25 13:42:31'
            ],
            [
                'avatar' => 'https://lh3.googleusercontent.com/a-/AOh14GhS1ETgrm04vNvoOeYgtUWtupkcC3UfxjwI5_tqxQ',
                'name' => 'Muhammad Reza Pahlevi Y',
                'email' => 'muhammad.reza.pahlevi.y@gmail.com',
                'jenis_kelamin' => 'laki-laki',
                'tanggal_lahir' => '1996-04-17',
                'no_handphone' => '089699179002',
                'role' => 1,
                'remember_token' => 'knxjo190gT4E6629bM0pvUuoZKmD9xcj4EeEdgjlXqcuNuzpHqQSkbygoYPB',
                'created_at' => '2020-03-04 10:14:31',
                'updated_at' => '2020-03-04 10:14:31'
            ],
            [
                'avatar' => 'https://lh3.googleusercontent.com/-9ULkHhZfMFQ/AAAAAAAAAAI/AAAAAAAAAAA/AKF05nAP8MT_SBQZAVN9DUgWtWnOw0OgtA/photo.jpg',
                'name' => 'Nadiah Tsp',
                'email' => 'tspnadiah@gmail.com',
                'jenis_kelamin' => 'perempuan',
                'tanggal_lahir' => '1998-09-14',
                'no_handphone' => '089799179002',
                'role' => 2,
                'remember_token' => 'cjhfTyzCys64cLNyjZMu1A1q8nlp6pKwoFLhxT2VJ6q8ZzmilVwKfLDtlSx3',
                'created_at' => '2020-03-25 15:49:25',
                'updated_at' => '2020-03-25 17:01:24'
            ],
            [
                'avatar' => 'https://lh3.googleusercontent.com/a-/AOh14GgwVwrMPKv_Cl_5p6mO5ov17NyOJehSy7QAgMkH',
                'name' => 'Liza',
                'email' => 'lizaconan2@gmail.com',
                'jenis_kelamin' => 'perempuan',
                'tanggal_lahir' => '2000-01-01',
                'no_handphone' => '01234567890',
                'role' => 1,
                'remember_token' => 'X1SueeExr1vQrBmVgp78Kv20t4OM6jZFzbAt5bIqtBn0eyZUmnszxGg9R5fH',
                'created_at' => '2020-03-25 15:50:20',
                'updated_at' => '2020-03-25 15:50:20'
            ],
            [
                'avatar' => 'https://lh3.googleusercontent.com/a-/AOh14GhtyWTOVvaJi6svRko32-coNW-yegA8w6k7Ccn0',
                'name' => 'Muhammad Reza Pahlevi Y Guru',
                'email' => 'reza.pahlevi.oa@gmail.com',
                'jenis_kelamin' => 'laki-laki',
                'tanggal_lahir' => '2020-03-18',
                'no_handphone' => '089799129002',
                'role' => 2,
                'remember_token' => 'Y9XIIkCVU7uis5dSRroArXQSNymfD3fh4FsWeZG3cOAlGH8OmDXTGi2GVkrU',
                'created_at' => '2020-03-25 08:50:58',
                'updated_at' => '2020-03-25 09:08:48'
            ],
            [
                'avatar' => 'https://lh3.googleusercontent.com/a-/AOh14GgESZJE3qYF18m9XYY1q5KDYpUe6gJ3QXKjYs8eEA',
                'name' => 'M. Rafi Nugroho',
                'email' => 'mrafiapex96@gmail.com', 
                'jenis_kelamin' => 'laki-laki', 
                'tanggal_lahir' => '1998-04-11', 
                'no_handphone' => '087874576875', 
                'role' => 2,
                'remember_token' => '85YzigVw9pjUF9lvsis0ZgeNFFTA81WqPpkUyHriEv3zTXtYZzLNEIXAo74q',
                'created_at' => '2020-04-02 07:32:51',
                'updated_at' => '2020-04-17 02:40:16'
            ],
        ];
        User::insert($data);
    }
}
