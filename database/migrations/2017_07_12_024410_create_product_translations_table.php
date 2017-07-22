<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_translations', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('site_translation_id')->unsigned();
            $table->foreign('site_translation_id')->references('id')->on('site_translations')->onDelete('cascade');
            
            $table->integer('page_translation_id')->unsigned();
            $table->foreign('page_translation_id')->references('id')->on('page_translations')->onDelete('cascade');
            
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
        Schema::dropIfExists('product_translations');
    }
}
