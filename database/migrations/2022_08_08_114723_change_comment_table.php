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
        Schema::table('comments', function (Blueprint $table){
            $table->foreignId('owner_id')->nullable()->change();
            $table->foreignId('petsitter_id')->nullable()->change();
        });

        Schema::table('comments', function(Blueprint $table){
            $table->dropColumn('createdAt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};