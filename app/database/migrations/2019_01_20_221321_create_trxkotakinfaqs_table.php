<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrxkotakinfaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('trxkotakinfaq', function (Blueprint $table) {
            $table->increments('id');
            //constraint dengan tabel lain (tabel amil, donatur, dan peruntukan donasi)
            $table->integer('donatur_id')->unsigned();
            $table->integer('amil_id')->unsigned();
            // $table->integer('peruntukandonasi_id')->unsigned();  //kotak infaq kan ya peruntukannya kotak infaq
            //data dari isiannya
            $table->date('tanggaldonasi');
            $table->bigInteger('jumlahtotal')->default(0);
            $table->text('keterangan')->nullable();
            //timestamps
            $table->timestamps();
        });

        Schema::table('trxkotakinfaq', function (Blueprint $table) {
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
        Schema::dropIfExists('trxkotakinfaq');
    }
}
