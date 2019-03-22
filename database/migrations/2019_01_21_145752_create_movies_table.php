<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->int("movie_id")->unique()->unsigned()->notnull();
            $table->int("voteCount");
            $table->dec("voteAverage")->unsigned()->notnull();
            $table->string("title");
            $table->dec("popularity");
            $table->string("posterPath");
            $table->string("originalLanguage");
            $table->string("originalTitle");
            $table->string("genreId");
            $table->string("backdrop_path");
            $table->boolean("pgRating");
            $table->string("overview");
            $table->DATE("releaseDate");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
