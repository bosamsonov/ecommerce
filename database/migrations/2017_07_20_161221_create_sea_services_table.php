<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeaServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sea_services', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('candidate_id')->unsigned();
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
 
            
            $table->string('company')->nullable();
            $table->string('rank')->nullable();
            $table->string('vessel')->nullable();
            $table->string('type')->nullable();
            $table->string('dwt')->nullable();
            $table->string('grt')->nullable();
            $table->string('me')->nullable();
            $table->string('kw')->nullable();
            $table->string('bhp')->nullable();
            $table->string('flag')->nullable();
            $table->date('from')->nullable();
            $table->date('to')->nullable();
            $table->string('owner')->nullable();
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
        Schema::dropIfExists('sea_services');
    }
}
