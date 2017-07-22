<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTranslationImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_translation_images', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('product_translation_id')->unsigned();
            $table->foreign('product_translation_id')->references('id')->on('product_translations')->onDelete('cascade');
    
            $table->string('image');
            
            $table->boolean('is_default')->default(false);
            
            $table->integer('sort_order')->default(0);
            
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
        Schema::dropIfExists('product_translation_images');
    }
}
