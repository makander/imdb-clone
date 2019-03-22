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
            $table->int('movieId')->unique()->unsigned()->notnull()->references('movieId')->on('movies');
            $table->string('author', 255)->notnull();
            $table->string('content');
            $table->int('reviewId')->unique()->unsigned()->notnull()->increments();
            $table->int('reviewRating')->nullable()->unsigned();

            $table->foreign('user_id')->references('userId')->on('users');
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
