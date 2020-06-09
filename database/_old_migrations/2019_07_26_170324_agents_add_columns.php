<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgentsAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agents', function (Blueprint $table) {
            $table -> integer('agent_id');
            $table -> string('firstname', 100);
            $table -> string('lastname', 100);
            $table -> string('suffix', 15);
            $table -> string('cell', 15);
            $table -> string('email', 100);
            $table -> text('photo_url');
            $table -> text('bio');
            $table -> text('website');
            $table -> string('llc', 100);
            $table -> string('designations', 100);
            $table -> string('company', 100);
            $table -> string('fullname', 100);
            $table -> string('mris_id_tp_md', 15);
            $table -> string('mris_id_tp_va', 15);
            $table -> string('mris_id_aap', 15);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agents', function (Blueprint $table) {
            //
        });
    }
}
