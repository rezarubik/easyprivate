<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateGrafikPemesananViews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        create or replace view grafikpemesanan AS
        SELECT tableSD.PemesananPerBulan as Pemesanan_SD, tableSMP.PemesananPerBulan as Pemesanan_SMP, tableSMA.PemesananPerBulan as Pemesanan_SMA, concat(tableSD.NAMA_BULAN, ' ', tableSD.tahun) as BULAN_TAHUN
        FROM
        
        (SELECT COUNT(*) as PemesananPerBulan,
        monthname(waktu_pemesanan) as NAMA_BULAN,
        EXTRACT(YEAR FROM waktu_pemesanan) as TAHUN,
        EXTRACT(MONTH FROM waktu_pemesanan) as BULAN,
        EXTRACT(YEAR_MONTH FROM waktu_pemesanan) as BULAN_TAHUN
        FROM pemesanan
        JOIN mata_pelajaran on mata_pelajaran.id_mapel = pemesanan.id_mapel
        JOIN jenjang on mata_pelajaran.id_jenjang = jenjang.id_jenjang
        WHERE jenjang.id_jenjang = 1
        GROUP BY EXTRACT(YEAR_MONTH FROM waktu_pemesanan), waktu_pemesanan) as tableSD
        
        LEFT JOIN
        
        (SELECT COUNT(*) as PemesananPerBulan,
        monthname(waktu_pemesanan) as NAMA_BULAN,
        EXTRACT(YEAR FROM waktu_pemesanan) as TAHUN,
        EXTRACT(MONTH FROM waktu_pemesanan) as BULAN,
        EXTRACT(YEAR_MONTH FROM waktu_pemesanan) as BULAN_TAHUN
        FROM pemesanan
        JOIN mata_pelajaran on mata_pelajaran.id_mapel = pemesanan.id_mapel
        JOIN jenjang on mata_pelajaran.id_jenjang = jenjang.id_jenjang
        WHERE jenjang.id_jenjang = 2
        GROUP BY EXTRACT(YEAR_MONTH FROM waktu_pemesanan), waktu_pemesanan) as tableSMP
        
        ON tableSMP.BULAN_TAHUN = tableSD.BULAN_TAHUN
        
        LEFT JOIN
        
        (SELECT COUNT(*) as PemesananPerBulan,
        monthname(waktu_pemesanan) as NAMA_BULAN,
        EXTRACT(YEAR FROM waktu_pemesanan) as TAHUN,
        EXTRACT(MONTH FROM waktu_pemesanan) as BULAN,
        EXTRACT(YEAR_MONTH FROM waktu_pemesanan) as BULAN_TAHUN
        FROM pemesanan
        JOIN mata_pelajaran on mata_pelajaran.id_mapel = pemesanan.id_mapel
        JOIN jenjang on mata_pelajaran.id_jenjang = jenjang.id_jenjang
        WHERE jenjang.id_jenjang = 3
        GROUP BY EXTRACT(YEAR_MONTH FROM waktu_pemesanan), waktu_pemesanan) as tableSMA
        
        ON tableSMA.BULAN_TAHUN = tableSMP.BULAN_TAHUN
        
        UNION
        
        SELECT tableSD.PemesananPerBulan as Pemesanan_SD, tableSMP.PemesananPerBulan as Pemesanan_SMP, tableSMA.PemesananPerBulan as Pemesanan_SMA, concat(tableSD.NAMA_BULAN, ' ', tableSD.tahun) as BULAN_TAHUN
        FROM
        
        (SELECT COUNT(*) as PemesananPerBulan,
        monthname(waktu_pemesanan) as NAMA_BULAN,
        EXTRACT(YEAR FROM waktu_pemesanan) as TAHUN,
        EXTRACT(MONTH FROM waktu_pemesanan) as BULAN,
        EXTRACT(YEAR_MONTH FROM waktu_pemesanan) as BULAN_TAHUN
        FROM pemesanan
        JOIN mata_pelajaran on mata_pelajaran.id_mapel = pemesanan.id_mapel
        JOIN jenjang on mata_pelajaran.id_jenjang = jenjang.id_jenjang
        WHERE jenjang.id_jenjang = 1
        GROUP BY EXTRACT(YEAR_MONTH FROM waktu_pemesanan), waktu_pemesanan) as tableSD
        
        RIGHT JOIN
        
        (SELECT COUNT(*) as PemesananPerBulan,
        monthname(waktu_pemesanan) as NAMA_BULAN,
        EXTRACT(YEAR FROM waktu_pemesanan) as TAHUN,
        EXTRACT(MONTH FROM waktu_pemesanan) as BULAN,
        EXTRACT(YEAR_MONTH FROM waktu_pemesanan) as BULAN_TAHUN
        FROM pemesanan
        JOIN mata_pelajaran on mata_pelajaran.id_mapel = pemesanan.id_mapel
        JOIN jenjang on mata_pelajaran.id_jenjang = jenjang.id_jenjang
        WHERE jenjang.id_jenjang = 2
        GROUP BY EXTRACT(YEAR_MONTH FROM waktu_pemesanan), waktu_pemesanan) as tableSMP
        
        ON tableSMP.BULAN_TAHUN = tableSD.BULAN_TAHUN
        
        RIGHT JOIN
        
        (SELECT COUNT(*) as PemesananPerBulan,
        monthname(waktu_pemesanan) as NAMA_BULAN,
        EXTRACT(YEAR FROM waktu_pemesanan) as TAHUN,
        EXTRACT(MONTH FROM waktu_pemesanan) as BULAN,
        EXTRACT(YEAR_MONTH FROM waktu_pemesanan) as BULAN_TAHUN
        FROM pemesanan
        JOIN mata_pelajaran on mata_pelajaran.id_mapel = pemesanan.id_mapel
        JOIN jenjang on mata_pelajaran.id_jenjang = jenjang.id_jenjang
        WHERE jenjang.id_jenjang = 3
        GROUP BY EXTRACT(YEAR_MONTH FROM waktu_pemesanan), waktu_pemesanan) as tableSMA
        
        ON tableSMA.BULAN_TAHUN = tableSMP.BULAN_TAHUN
        ");
        // Schema::create('grafik_pemesanan_views', function (Blueprint $table) {
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
        Schema::dropIfExists('grafik_pemesanan_views');
    }
}
