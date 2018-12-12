<?php

use Illuminate\Support\Facades\Schema;
// use Illuminate\Database\Schema\Blueprint;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('artist');
            $table->enum('category_artist', ['boyband', 'girlband', 'solo']);
            $table->integer('year');
            $table->string('genre_music');
            $table->string('track');
            $table->string('img');
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
        Schema::dropIfExists('albums');
    }
}
