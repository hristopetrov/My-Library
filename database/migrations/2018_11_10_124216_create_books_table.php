<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('isbn');
            $table->integer('year');
            $table->text('description');
            $table->string('image')->nullable();
            $table->timestamps();
        });

          Schema::create('book_user',function(Blueprint $table){
            $table->integer('book_id')->unsigned()->index();
            $table->foreign('book_id')->references('id')->on('books');

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('books');
        Schema::dropIfExists('book_user');
    }
}
