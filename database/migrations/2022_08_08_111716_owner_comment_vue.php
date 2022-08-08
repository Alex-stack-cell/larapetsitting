<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            'CREATE VIEW owner_comment_vue
            AS 
            SELECT owners.id, owners.lastName, owners.firstName, owners.birthdate, owners.email,ROUND(AVG(comments.score),2)
            FROM owners
            INNER JOIN comments ON comments.owner_id = owners.id
            GROUP BY owners.id'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW owner_comment_vue');
    }
};