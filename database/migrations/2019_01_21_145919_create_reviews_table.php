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
            $table->integer('id')->unique()->unsigned()->notnull()->references('id')->on('movies');
            $table->string('author', 255)->notnull();
            $table->integer('author_id')->unique()->unsigned()->notnull()->references('id')->on('users');
            $table->string('content');
            $table->integer('review_id')->unique()->unsigned()->notnull()->increments();
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
