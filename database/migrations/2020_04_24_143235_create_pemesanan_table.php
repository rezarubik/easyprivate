<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->bigIncrements('id_pemesanan');
            $table->integer('id_guru')->nullable();
            $table->integer('id_murid')->nullable();
            $table->integer('id_mapel')->nullable();
            $table->integer('kelas')->nullable();
            $table->dateTime('waktu_pemesanan')->nullable();
            $table->integer('status')->nullable();
            $table->integer('jumlah_pertemuan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanan');
    }
}
