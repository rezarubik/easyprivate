<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalPemesananPermingguTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_pemesanan_perminggu', function (Blueprint $table) {
            $table->bigIncrements('id_jadwal_pemesanan_perminggu');
            $table->integer('id_pemesanan')->nullable();
            $table->integer('id_jadwal_available')->nullable();
            $table->integer('id_event')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_pemesanan_perminggu');
    }
}
