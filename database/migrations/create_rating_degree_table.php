<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    public function up()
    {
        Schema::create('rating_degrees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rating');
            $table->integer('label_id');
            $table->integer('user_id');
            $table->morphs('ratingable');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rating_degrees');
    }
}