<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransaksisTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('peminjam_id')->unsigned();
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('nama_acara');
            $table->string('penanggung_jawab');
            $table->string('kontak');
            $table->integer('ruangan_id')->unsigned();
            $table->integer('konfirmasi_wr_id')->unsigned()->nullable();
            $table->integer('konfirmasi_kbsd_id')->unsigned()->nullable();
            $table->integer('konfirmasi_kbu_id')->unsigned()->nullable();
            $table->integer('konfirmasi_ksbrt_id')->unsigned()->nullable();
            $table->integer('status');
            $table->year('periode');
            $table->timestamps();
            $table->foreign('peminjam_id')->references('id')->on('peminjams')->onDelete('cascade');
            $table->foreign('ruangan_id')->references('id')->on('ruangans')->onDelete('cascade');
            $table->foreign('konfirmasi_wr_id')->references('id')->on('pesan_konfirmasis')->onDelete('set null');
            $table->foreign('konfirmasi_kbsd_id')->references('id')->on('pesan_konfirmasis')->onDelete('set null');
            $table->foreign('konfirmasi_kbu_id')->references('id')->on('pesan_konfirmasis')->onDelete('set null');
            $table->foreign('konfirmasi_ksbrt_id')->references('id')->on('pesan_konfirmasis')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transaksis');
    }
}
