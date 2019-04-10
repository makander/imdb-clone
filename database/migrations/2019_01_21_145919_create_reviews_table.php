<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id')->uniqe();
            $table->integer('movie_id')->unsigned()->notnull();
            $table->integer('author_id')->unsigned()->notnull()->references('id')->on('users');
            $table->string('nickName')->references('nickName')->on('users');
            $table->longText('content');
            $table->integer('reviewRating')->nullable()->unsigned();
            $table->boolean('approved')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
