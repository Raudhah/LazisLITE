<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amil', function (Blueprint $table) {
            $table->increments('id');
            $table->string('namaamil', 128);
            $table->string('alamatamil', 128)->nullable();
            $table->string('nomorteleponamil', 32)->nullable();
            $table->boolean('statusaktif')->default(true);
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
        Schema::dropIfExists('amil');
    }
}
