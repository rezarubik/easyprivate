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
            $table->integer('id_user')->nullable();
            $table->string('id_transaksi')->nullable();
            $table->string('id_order')->nullable();
            $table->string('status')->nullable();
            $table->integer('jumlah_bayar')->nullable();
            $table->dateTime('tanggal_bayar')->nullable(); // ? Tanggal murid bayar ke kita
            $table->string('periode_bulan')->nullable();
            $table->string('periode_tahun')->nullable();
            $table->string('redirect_url')->nullable();
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
