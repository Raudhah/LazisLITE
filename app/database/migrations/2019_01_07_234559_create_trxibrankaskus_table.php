<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrxibrankaskusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trxibrankasku', function (Blueprint $table) {
            $table->increments('id');
            //constraint dengan tabel lain (tabel amil, donatur, dan peruntukan donasi)
            $table->integer('donatur_id')->unsigned();
            $table->integer('amil_id')->unsigned();
            $table->integer('peruntukandonasi_id')->unsigned();
            //data dari isiannya
            $table->date('tanggaldonasi');
            $table->text('deskripsibarang');
            $table->bigInteger('nominalvaluasi')->default(0);
            //timestamps
            $table->timestamps();
        });

        Schema::table('trxibrankasku', function (Blueprint $table) {
            //set foreign key constraints-nya
            $table->foreign('peruntukandonasi_id')->references('id')->on('peruntukandonasi');
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
        Schema::dropIfExists('trxibrankasku');
    }
}
