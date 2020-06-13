<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->bigIncrements('id_pembayaran');
            $table->integer('id_pemesanan')->nullable();
            $table->integer('status')->nullable();
            $table->integer('jumlah_bayar')->nullable();
            $table->date('tanggal_bayar')->nullable();
            $table->date('jatuh_tempo')->nullable();
            $table->string('periode_bulan')->nullable();
            $table->string('periode_tahun')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
}
