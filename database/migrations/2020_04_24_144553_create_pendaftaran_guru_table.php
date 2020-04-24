<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran_guru', function (Blueprint $table) {
            $table->bigIncrements('id_pendaftaran');
            $table->integer('id_user')->nullable();
            $table->string('dir_cv', 255)->nullable();
            $table->integer('pm_gap_score')->nullable();
            $table->integer('pm_result')->nullable();
            $table->integer('status')->nullable();
            $table->integer('pengalaman_mengajar')->nullable();
            $table->float('nilai_ipk')->nullable();
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
        Schema::dropIfExists('pendaftaran_guru');
    }
}
