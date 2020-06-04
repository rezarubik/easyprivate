<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateGrafikGuruViews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            create or replace view grafikGuru as
            select 
            table_a.counts - count(*) as jumlah_guru_belum_dapat,
            count(*) as jumlah_guru_sudah_dapat,
            concat(monthname(waktu_pemesanan), ' ',extract(year from waktu_pemesanan)) as bulan_tahun 
            from pemesanan,
            (select count(*) as counts from users where role = 2) as table_a
            group by bulan_tahun, table_a.counts
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grafik_guru_views');
    }
}
