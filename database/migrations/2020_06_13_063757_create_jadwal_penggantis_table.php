<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalPenggantisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_penggantis', function (Blueprint $table) {
            $table->bigIncrements('id_jadwal_pengganti');
            $table->integer('id_pemesanan')->nullable();
            $table->integer('id_jadwal_pemesanan_perminggu')->nullable();
            $table->dateTime('waktu_pengganti')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_penggantis');
    }
}
