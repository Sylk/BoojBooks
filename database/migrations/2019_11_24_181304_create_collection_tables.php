<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('book_collection', function (Blueprint $table) {
            $table->primary(['book_id', 'collection_id']);
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('collection_id');
//            $table->integer('order')->nullable();
            $table->integer('position');
        });

        Schema::table('book_collection', function ($table) {
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('collection_id')->references('id')->on('collections');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_collection');
        Schema::dropIfExists('collections');
    }
}
