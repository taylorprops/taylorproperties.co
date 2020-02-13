<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FeaturedListingsAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('featured_listings', function (Blueprint $table) {
            $table -> string('ListingSourceRecordKey', 100);
            $table -> string('ListingSourceRecordID', 100);
            $table -> string('ListingId', 100);
            $table -> string('FullStreetAddress', 100);
            $table -> string('City', 100);
            $table -> string('StateOrProvince', 100);
            $table -> string('PostalCode', 100);
            $table -> string('SubdivisionName', 100);
            $table -> text('ListPictureURL');
            $table -> text('PublicRemarks');
            $table -> decimal('ListPrice', 14, 2);
            $table -> integer('BedroomsTotal');
            $table -> integer('BathroomsFull');
            $table -> integer('BathroomsHalf');
            $table -> integer('LivingArea');
            $table -> integer('ListAgentMlsId');
            $table -> date('MLSListDate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('featured_listings', function (Blueprint $table) {
            //
        });
    }
}
