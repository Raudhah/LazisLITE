<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLzPeruntukan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('peruntukandonasi', function(Blueprint $table){
            $table->increments('id');
            $table->string('namaperuntukandonasi');
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
        //
        Schema::dropIfExists('peruntukandonasi');
    }
}
