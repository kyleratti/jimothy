<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 32)->index();
            $table->string('slug', 32)->nullable()->unique();
            $table->integer('board')->index();
            $table->integer('owner')->index();
            $table->boolean('sticky')->nullable()->default(false)->index();
            $table->boolean('locked')->nullable()->default(false);
            $table->boolean('deleted')->nullable()->default(false)->index();
            $table->timestamps();

            $table->foreign('board')->references('id')->on('boards');
            $table->foreign('owner')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('threads');
    }
}
