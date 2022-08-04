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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained()->onDelete(('cascade'));
            $table->foreignId('petsitter_id')->constrained()->onDelete(('cascade'));
            $table->foreignId('prestation_id')->constrained()->onDelete(('cascade'));
            $table->string('title');
            $table->string('description');
            $table->dateTime('createdAt');
            $table->integer('score');
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
        Schema::dropIfExists('comments');
    }
};