<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersSearchesAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_searches', function (Blueprint $table) {
            $table -> integer('user_id');
            $table -> text('query_string');
            $table -> string('alias');
            $table -> $table -> dateTime('start_from_datetime') -> default(new DateTime());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_searches', function (Blueprint $table) {
            //
        });
    }
}
