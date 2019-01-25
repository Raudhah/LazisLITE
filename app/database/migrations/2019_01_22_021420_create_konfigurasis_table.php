<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKonfigurasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konfigurasi', function (Blueprint $table) {
            $table->increments('id');
            $table->text('namalaz')->nullable();
            $table->text('kodelaz')->nullable();
            $table->text('namacabang')->nullable();
            $table->text('kodecabang')->nullable();
            $table->text('alamatcabang')->nullable();
            $table->text('nomorteleponcabang')->nullable();
            $table->text('websitecabang')->nullable();
            $table->text('emailcabang')->nullable();
            $table->text('nomorrekeningcabang')->nullable();
            $table->text('keterangan')->nullable();
            $table->text('tekskuitansi')->nullable();
            $table->text('namafilelogo')->nullable();
            $table->text('namafilettd')->nullable();
            $table->text('namafilebackground')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konfigurasi');
    }
}
