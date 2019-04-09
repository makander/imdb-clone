<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casts', function (Blueprint $table) {
            $table->increments('castId')->unique()->unsigned()->notnull(); 
            $table->string('character', 255); 
            $table->string('gender', 255);
            $table->integer('movieId')->unique()->unsigned()->notnull()->references('movieId')->on('movies');
            $table->string('name', 255)->notnull();
            $table->integer('order')->unsigned();
            $table->string('profilePath');
        }
    );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('casts');
    }
}
