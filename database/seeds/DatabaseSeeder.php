<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UserSeeder');
        $this->call('AlamatSeeder');
        $this->call('PendaftaranGuruSeeder');
        $this->call('ProfileMatchingSeeder');
        $this->call('JenjangSeeder');
        $this->call('MataPelajaranSeeder');
        $this->call('PemesananSeeder');
        $this->call('JadwalAjarSeeder');
        $this->call('JadwalAvailableSeeder');
        $this->call('JadwalPemesananPermingguSeeder');
        $this->call('AbsenSeeder');
    }
}
