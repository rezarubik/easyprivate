<?php

use Illuminate\Database\Seeder;
use App\Pembayaran;

class PembayaranSeeder extends Seeder
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
                'id_tansaksi'=>'5517fc64-1bdb-4614-8500-e7fa768f4d41',
                'status'=>200,
                'jumlah_bayar'=>120000,
                'tanggal_bayar'=>'2020-06-24 23:30:06',
                'periode_bulan'=>5,
                'periode_tahun'=>2020,
                'redirect_url'=>''
            ],
            
        ];
        Pembayaran::insert($data);
    }
}
