<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersShowingRequestsAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_showing_requests', function (Blueprint $table) {
            $table -> integer('user_id');
            $table -> string('name', 100);
            $table -> string('phone', 100);
            $table -> string('email', 100);
            $table -> string('listing_id', 100);
            $table -> date('showing_date');
            $table -> time('showing_time');
            $table -> date('showing_date_alt');
            $table -> time('showing_time_alt');
            $table -> text('_token');
            $table -> text('comments') -> nullable();
            $table -> text('address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_showing_requests', function (Blueprint $table) {
            //
        });
    }
}
