<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petsitters', function (Blueprint $table) {
            $table->id(); 
            $table->string('lastName');
            $table->string('firstName');
            $table->dateTime('birthdate');
            $table->string('petpreference');
            $table->string('email')->unique();
            // $table->float('score',1,2); // score removed as it is not relevant here
            $table->string('password',8);
            $table->rememberToken();
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
        Schema::dropIfExists('petsitter');
    }
};