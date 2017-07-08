<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_translations', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('site_id')->unsigned();
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
            
            $table->string('language_name');
            $table->string('language_code');
            $table->enum('language_type', ['host', 'subdomain', 'path']);
            
            $table->unique(['site_id', 'language_name']);
            $table->unique(['site_id', 'language_code']);
            
            $table->string('host');
            
            $table->boolean('is_default');
            
            $table->boolean('is_enabled');
            
            $table->integer('sort_order');

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
        Schema::dropIfExists('site_translations');
    }
}
