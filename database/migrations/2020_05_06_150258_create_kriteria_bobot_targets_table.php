<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKriteriaBobotTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriteria_bobot_targets', function (Blueprint $table) {
            $table->bigIncrements('id_kriteria_bobot_target');
            $table->string('kriteria', 255)->nullable();
            $table->float('bobot')->nullable();
            $table->string('faktor_kriteria', 100)->nullable();
            $table->integer('nilai_target')->nullable();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kriteria_bobot_targets');
    }
}
