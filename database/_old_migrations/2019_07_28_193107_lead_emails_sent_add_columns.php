<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LeadEmailsSentAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lead_emails_sent', function (Blueprint $table) {
            $table -> timestamp('sent');
            $table -> integer('to_client_id');
            $table -> integer('to_agent_id');
            $table -> string('to_email', 100);
            $table -> string('to_name', 100);
            $table -> text('subject');
            $table -> text('message');
            $table -> string('email_type', 200); /* registration_complete|property_update| */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lead_emails_sent', function (Blueprint $table) {
            //
        });
    }
}
