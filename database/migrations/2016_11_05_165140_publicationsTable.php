<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('publication');
            $table->string('author');
            $table->timestamps();
        });

        Schema::create('publications_categories', function(Blueprint $table){
            $table->integer('publication_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->foreign('publication_id')->references('id')->on('publications');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->primary(['publication_id','category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('publications_categories');
        Schema::drop('publications');
    }
}
