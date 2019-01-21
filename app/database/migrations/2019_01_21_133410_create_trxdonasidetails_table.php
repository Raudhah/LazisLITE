<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrxdonasidetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trxdonasidetail', function (Blueprint $table) {
            $table->increments('id');
            //constraint dengan tabel lain (tabel Trxdonasi, dan peruntukan donasi)
            $table->integer('trxdonasi_id')->unsigned();
            $table->integer('peruntukandonasi_id')->unsigned();
            //data dari isiannya
            $table->bigInteger('jumlah')->default(0);
            //timestamps
            $table->timestamps();
        });

        Schema::table('trxdonasidetail', function (Blueprint $table) {
            //set foreign key constraints-nya
            $table->foreign('peruntukandonasi_id')->references('id')->on('peruntukandonasi');
            $table->foreign('trxdonasi_id')->references('id')->on('trxdonasi');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trxdonasidetail');
    }
}
