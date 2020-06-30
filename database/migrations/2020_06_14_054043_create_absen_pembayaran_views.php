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
        CREATE OR REPLACE VIEW absen_pembayaran
        AS SELECT 
            p.id_murid,
            p.id_pemesanan,
            p.id_guru,
            count(*) as jumlah_absen,
            extract(YEAR FROM absen.waktu_absen) as tahun,
            extract(MONTH from absen.waktu_absen) as bulan,
            pb.id_pembayaran
        FROM absen
        JOIN pemesanan as p
            ON p.id_pemesanan = absen.id_pemesanan
        LEFT JOIN pembayaran as pb
            ON extract(YEAR FROM absen.waktu_absen) = pb.periode_tahun
            AND extract(MONTH FROM absen.waktu_absen) = pb.periode_bulan
            AND p.id_murid = pb.id_user
        GROUP BY 
            tahun,
            bulan,
            p.id_pemesanan,
            p.id_guru,
            p.id_murid,
            pb.id_pembayaran
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
