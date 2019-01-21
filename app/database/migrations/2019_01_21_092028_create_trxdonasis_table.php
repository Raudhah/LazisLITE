<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrxdonasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trxdonasi', function (Blueprint $table) {
            $table->increments('id');
            //constraint dengan tabel lain (tabel amil, donatur, dan peruntukan donasi)
            $table->integer('donatur_id')->unsigned();
            $table->integer('amil_id')->unsigned();
            //data dari isiannya
            $table->boolean('insidentil')->nullable()->default(0);
            $table->date('tanggaldonasi');
            $table->bigInteger('jumlahtotal')->default(0);
            $table->text('keterangan')->nullable();
            //timestamps
            $table->timestamps();
        });

        Schema::table('trxdonasi', function (Blueprint $table) {
            //set foreign key constraints-nya
            $table->foreign('donatur_id')->references('id')->on('donatur');
            $table->foreign('amil_id')->references('id')->on('amil');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trxdonasi');
    }
}
