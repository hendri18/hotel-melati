<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            // $table->id();
            $table->increments('id_transaksi');
            $table->integer('id_pengunjung')->unsigned();
            $table->foreign('id_pengunjung')->references('id_pengunjung')->on('pengunjung');
            $table->integer('id_kamar')->unsigned();
            $table->foreign('id_kamar')->references('id_kamar')->on('kamar');
            $table->date('checkin_date');
            $table->date('checkout_date');
            $table->integer('total_harga');
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
        Schema::dropIfExists('transaksi');
    }
}
