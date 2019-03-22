<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovieListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_list', function (Blueprint $table) {
            $table->integer('list_id')->references('list_id')->on('lists');
            $table->integer('movie_id')->notnull();
            $table->string('movie_title')->notnull();
            $table->string('movie_pic');
            $table->decimal('avrage_rate');
            $table->integer('year');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_lists');
    }
}
