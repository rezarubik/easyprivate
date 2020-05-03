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
            $table->float('pm_pk')->nullable();
            $table->float('pm_vas')->nullable();
            $table->float('pm_kk')->nullable();
            $table->float('pm_cm')->nullable();
            $table->float('pm_pemat')->nullable();
            $table->float('pm_ipk')->nullable();
            $table->float('pm_usia')->nullable();
            $table->float('pm_km')->nullable();
            $table->float('pm_gap')->nullable();
            $table->float('pm_bobot')->nullable();
            $table->float('pm_ncf')->nullable();
            $table->float('pm_scf')->nullable();
            $table->float('pm_result')->nullable();
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
