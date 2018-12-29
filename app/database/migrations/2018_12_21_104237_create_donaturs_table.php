<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonatursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donatur', function (Blueprint $table) {
            $table->increments('id');
            //data standar
            $table->string('namadonatur', 128);
            $table->string('alamatdonatur', 128)->nullable();
            $table->string('nomortelepondonatur', 32)->nullable();
            $table->date('tanggallahir')->nullable;
            //constraint dengan tabel lain (tabel amil dan tabel pekerjaan donatur)
            $table->integer('pekerjaandonatur_id')->unsigned();
            $table->integer('amil_id')->unsigned();
            //untuk mengecek apakah termasuk kategori donatur2 berikut
            $table->boolean('isdonaturrutin')->default(false);
            $table->boolean('iskotakinfaq')->default(false);
            $table->boolean('isdonaturinsidental')->default(false);
            //1:laki 2:perempuan 3:tidak disebutkan (mis. perusahaan)
            $table->tinyInteger('jeniskelamin')->default(3);     
            $table->timestamps();
        });

        Schema::table('donatur', function (Blueprint $table) {
            //set foreign key constraints-nya
            $table->foreign('pekerjaandonatur_id')->references('id')->on('pekerjaandonatur');
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
        Schema::dropIfExists('donatur');
    }
}
