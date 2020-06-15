<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAbsenPembayaranViews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
             create or REPLACE VIEW absen_pembayaran as SELECT p.id_murid, count(*) as jumlah_absen, extract(YEAR FROM absen.waktu_absen) as tahun, extract(MONTH from absen.waktu_absen) as bulan 
             FROM absen 
             join pemesanan as p on p.id_pemesanan = absen.id_pemesanan 
             group by tahun,bulan,p.id_murid
        ");

        // Schema::create('absen_pembayaran_views', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absen_pembayaran_views');
    }
}
