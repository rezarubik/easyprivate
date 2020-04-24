<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMicroteachingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('microteaching', function (Blueprint $table) {
            $table->bigIncrements('id_microteaching');
            $table->integer('id_pendaftaran')->nullable();
            $table->string('dir_video', 255)->nullabel();
            $table->integer('volume_artikulasi_suara')->nullable();
            $table->integer('keefektifan_kalimat')->nullable();
            $table->integer('cara_mengajar')->nullable();
            $table->integer('penguasaan_materi')->nullable();
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
        Schema::dropIfExists('microteaching');
    }
}
