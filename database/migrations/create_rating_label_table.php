<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    public function up()
    {
        Schema::create('rating_labels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('min')->default(0);
            $table->integer('max')->default(5);
            $table->decimal('average_rate',10,2)->default(0);
            $table->integer('rating_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rating_labels');
    }
}