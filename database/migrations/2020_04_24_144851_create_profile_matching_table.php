<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileMatchingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_matching', function (Blueprint $table) {
            $table->bigIncrements('id_profile_matching');
            $table->integer('id_pendaftaran_guru')->nullable();
            $table->integer('pm_pk')->nullable();
            $table->integer('pm_vas')->nullable();
            $table->integer('pm_kk')->nullable();
            $table->integer('pm_cm')->nullable();
            $table->integer('pm_pemat')->nullable();
            $table->integer('pm_ipk')->nullable();
            $table->integer('pm_usia')->nullable();
            $table->integer('pm_km')->nullable();
            $table->integer('pm_result')->nullable();
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
        Schema::dropIfExists('profile_matching');
    }
}
