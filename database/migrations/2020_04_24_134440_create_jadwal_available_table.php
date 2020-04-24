<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalAvailableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_available', function (Blueprint $table) {
            $table->bigIncrements('id_jadwal_available');
            $table->integer('id_user')->nullable();
            $table->string('hari', 9)->nullable();
            $table->time('start')->nullable();
            $table->time('end')->nullable();
            $table->integer('available')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_available');
    }
}
