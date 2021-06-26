<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKamarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kamar', function (Blueprint $table) {
            // $table->id();
            $table->increments('id_kamar');
            $table->integer('id_type_kamar')->unsigned();
            $table->foreign('id_type_kamar')->references('id_type_kamar')->on('type_kamar');
            $table->string('nomor_kamar');
            $table->string('status_kamar');
            $table->text('gambar')->nullable();
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
        Schema::dropIfExists('kamar');
    }
}
