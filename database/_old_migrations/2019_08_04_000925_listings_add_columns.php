<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ListingsAddColumns extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('listings', function (Blueprint $table) {
            $table -> text('Appliances') -> nullable();
            $table -> decimal('AssociationFee',14,2) -> nullable();
            $table -> string('AssociationFeeFrequency',50) -> nullable();
            $table -> string('AssociationYN', 5) -> nullable();
            $table -> string('AttachedGarageYN', 5) -> nullable();
            $table -> decimal('BasementFinishedPercent', 32,2) -> nullable();
            $table -> string('BasementYN', 5) -> nullable();
            $table -> integer('BathroomsTotalInteger') -> nullable();
            $table -> integer('BedroomsTotal') -> nullable();
            $table -> point('c_Coordinates') -> nullable();
            $table -> string('City',50) -> nullable();
            $table -> string('CondoYN', 5) -> nullable();
            $table -> text('Cooling') -> nullable();
            $table -> string('County',50) -> nullable();
            $table -> string('ElementarySchool',80) -> nullable();
            $table -> string('FireplaceYN', 5) -> nullable();
            $table -> string('FullStreetAddress',80) -> nullable();
            $table -> string('GarageYN', 5) -> nullable();
            $table -> text('Heating') -> nullable();
            $table -> string('HighSchool',80) -> nullable();
            $table -> decimal('Latitude', 12,8) -> nullable();
            $table -> string('ListingId',50) -> nullable();
            $table -> string('ListOfficeName',50) -> nullable();
            $table -> text('ListPictureURL') -> nullable();
            $table -> decimal('ListPrice', 14,2) -> nullable();
            $table -> integer('LivingArea') -> nullable();
            $table -> decimal('Longitude', 12,8) -> nullable();
            $table -> decimal('LotSizeAcres', 14,2) -> nullable();
            $table -> decimal('LotSizeSquareFeet', 14,2) -> nullable();
            $table -> datetime('MajorChangeTimestamp') -> nullable();
            $table -> string('MiddleOrJuniorSchool',80) -> nullable();
            $table -> date('MLSListDate') -> nullable();
            $table -> string('MlsStatus',50) -> nullable();
            $table -> string('NewConstructionYN',5) -> nullable();
            $table -> integer('NumAttachedGarageSpaces') -> nullable();
            $table -> integer('NumDetachedGarageSpaces') -> nullable();
            $table -> text('Pool') -> nullable();
            $table -> string('PostalCode',10) -> nullable();
            $table -> string('PropertySubType',50) -> nullable();
            $table -> string('PropertyType',50) -> nullable();
            $table -> text('PublicRemarks') -> nullable();
            $table -> text('SaleType') -> nullable();
            $table -> string('StateOrProvince',50) -> nullable();
            $table -> string('StructureDesignType',100) -> nullable();
            $table -> string('SubdivisionName',50) -> nullable();
            $table -> integer('TotalPhotos') -> nullable();
            $table -> string('UnitBuildingType',50) -> nullable();
            $table -> integer('YearBuilt') -> nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('listings', function (Blueprint $table) {
            //
        });
    }
}
