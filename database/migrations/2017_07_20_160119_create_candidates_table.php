<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('surname')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('rank')->nullable();

            
            $table->string('phone_cell')->nullable();
            $table->string('phone_home')->nullable();
            $table->string('email')->nullable();
            $table->string('skype')->nullable();
            
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            
            $table->enum('marital_status', ['single', 'married', 'divorced', 'widower'])->nullable();
            
            $table->date('dob')->nullable();
            
            $table->string('nationality')->nullable();
            
            $table->integer('children')->nullable();
            
            $table->string('birth_place')->nullable();
            
            $table->string('nearest_airport')->nullable();
            
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('shoes_size')->nullable();
            $table->string('eyes')->nullable();
            $table->string('hair')->nullable();
            
            $table->string('passport_no')->nullable();
            $table->date('passport_issued')->nullable();
            $table->date('passport_expiry')->nullable();
            $table->string('passport_place')->nullable();
            
            $table->string('seamensbook_no')->nullable();
            $table->date('seamensbook_issued')->nullable();
            $table->date('seamensbook_expiry')->nullable();
            $table->string('seamensbook_place')->nullable();
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
        Schema::dropIfExists('candidates');
    }
}
