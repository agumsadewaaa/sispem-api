<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRuangansTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruangans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_ruangan');
            $table->integer('kapasitas');
            $table->integer('need_wr_conf')->default(0);
            $table->integer('penjaga_id')->unsigned();
            $table->timestamps();
            $table->foreign('penjaga_id')->references('id')->on('penjagas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ruangans');
    }
}
