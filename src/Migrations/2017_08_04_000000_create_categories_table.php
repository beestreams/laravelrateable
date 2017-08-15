<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ratable_id')->unsigned();
            $table->text('ratable_type');
            $table->integer('rater_id')->unsigned();
            $table->integer('rating')->unsigned();
            $table->timestamps();
        });
        $table->foreign('rater_id')->references('id')->on('users')->onDelete('cascade');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}