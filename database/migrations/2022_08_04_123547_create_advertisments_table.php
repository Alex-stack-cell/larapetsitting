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
        Schema::create('advertisments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained()->onDelete(('cascade'));
            $table->foreignId('prestation_id')->constrained()->onDelete(('cascade'));
            $table->string('title');
            $table->string('tags');
            $table->string('description');
            $table->dateTime('createdAt');
            $table->string('postCode');
            $table->string('city');
            $table->dateTime('dateStart');
            $table->dateTime('dateEnd');
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
        Schema::dropIfExists('advertisments');
    }
};