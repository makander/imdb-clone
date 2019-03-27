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
            $table->string('content');
            $table->integer('review_id')->unique()->unsigned()->notnull()->increments()->default(0);
            $table->integer('reviewRating')->nullable()->unsigned();
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
