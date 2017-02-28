<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20)->index();
            $table->string('description', 128);
            $table->integer('category')->unsigned()->index();
            $table->integer('weight')->unsigned()->index();
            $table->boolean('enabled')->default(true);
            $table->timestamps();

            $table->foreign('category')->references('id')->on('boardcategories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boards');
    }
}
