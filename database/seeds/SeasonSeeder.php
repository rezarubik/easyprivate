<?php

use Illuminate\Database\Seeder;
use App\Season;

class SeasonSeeder extends Seeder
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
                'start' => '2020-01-01',
                'end' => '2020-02-01'
            ],
            [
                'start' => '2020-03-01',
                'end' => '2020-04-02'
            ]
        ];
        Season::insert($data);
    }
}
