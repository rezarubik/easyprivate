<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpahGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upah_guru', function (Blueprint $table) {
            $table->bigIncrements('id_upah_guru');
            $table->integer('id_guru')->nullable();
            $table->integer('id_jenjang')->nullable();
            $table->integer('jumlah_upah')->nullable();
            $table->integer('tanggal_upah')->nullable();
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
        Schema::dropIfExists('upah_guru');
    }
}
