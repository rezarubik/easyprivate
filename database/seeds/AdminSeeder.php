<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminSeeder extends Seeder
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
                'name' => 'Admin Easy Private',
                'email' => 'cs.easyprivate@gmail.com',
                'password' => bcrypt('101417@Ep')
            ],
        ];
        Admin::insert($data);
    }
}
