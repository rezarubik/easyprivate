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
            $table->integer('id_season')->nullable();
            $table->integer('id_user')->nullable();
            $table->string('dir_cv', 255)->nullable();
            $table->string('dir_video', 255)->nullable();
            $table->string('universitas', 255)->nullable();
            $table->integer('status')->nullable();
            $table->integer('pengalaman_mengajar')->nullable();
            $table->float('nilai_ipk')->nullable();
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
