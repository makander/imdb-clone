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
            $table->integer('movieId')->unique()->unsigned()->notnull()->references('movieId')->on('movies');
            $table->string('author', 255)->notnull();
            $table->string('content');
            $table->integer('reviewId')->unique()->unsigned()->notnull()->increments();
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
