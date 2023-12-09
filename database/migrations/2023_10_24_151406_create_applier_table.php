<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applier', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->date('birth_date');
            $table->string('picture')->default('profile/default.jpeg');
            $table->string('resume')->nullable();
            $table->string('bio')->nullable();    
            $table->string('experience')->nullable(); 
            $table->string('categories')->nullable();       
            $table->string('languages')->nullable();    
            $table->string('country')->nullable();    
            $table->string('city')->nullable();    
            $table->string('address')->nullable();    
            $table->string('facebook')->nullable();    
            $table->string('twitter')->nullable();    
            $table->string('instagram')->nullable();    
            $table->string('linkedin')->nullable();    
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
        Schema::dropIfExists('applier');
    }
}
