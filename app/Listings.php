<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listings extends Model
{
    protected $connection = 'taylorproperties';
    protected $table = 'listings';

    public function scopeGetSelectColumns($query) {

        return $query -> select('ListingId', 'FullStreetAddress', 'City', 'StateOrProvince', 'PostalCode', 'County', 'ListPrice', 'Latitude', 'Longitude', 'ListPictureURL', 'BedroomsTotal', 'BathroomsTotalInteger', 'LivingArea', 'CondoYN', 'UnitBuildingType', 'TotalPhotos', 'PropertyType', 'SubdivisionName', 'ListOfficeName', 'MLSListDate');

    }

    public function scopeGetSelectDetailsColumns($query) {

        return $query -> select(
            'Appliances',
            'AssociationYN',
            'AssociationFee',
            'AssociationFeeFrequency',
            'AttachedGarageYN',
            'BasementYN',
            'BasementFinishedPercent',
            'BathroomsTotalInteger',
            'BedroomsTotal',
            'City',
            'CondoYN',
            'Cooling',
            'County',
            'ElementarySchool',
            'FireplaceYN',
            'FullStreetAddress',
            'GarageYN',
            'Heating',
            'HighSchool',
            'Latitude',
            'ListingId',
            'ListOfficeName',
            'ListPictureURL',
            'ListPrice',
            'LivingArea',
            'Longitude',
            'LotSizeAcres',
            'LotSizeSquareFeet',
            'MiddleOrJuniorSchool',
            'MlsStatus',
            'MLSListDate',
            'NumAttachedGarageSpaces',
            'NumDetachedGarageSpaces',
            'Pool',
            'PostalCode',
            'PropertySubType',
            'PropertyType',
            'PublicRemarks',
            'SaleType',
            'StateOrProvince',
            'SubdivisionName',
            'TotalPhotos',
            'UnitBuildingType',
            'YearBuilt'
        );

    }

    public function scopeGetListing($listings, $listing_id) {
        return $listings -> getSelectDetailsColumns() -> where('ListingID', $listing_id);
    }

    public function scopeGetListings($listings, $state, $city, $county, $zip, $coordinates, $beds, $baths, $min_price, $max_price, $for_sale, $rentals, $detached, $apartments, $condos, $townhouse, $land, $farms, $multifamily, $duplex, $standard, $new_construction, $foreclosures, $short_sales, $auction, $subdivision, $sq_ft_min, $sq_ft_max, $year_built_min, $year_built_max, $lot_size_min, $lot_size_max, $start_from_datetime, $saved_search_id) {

        // remove commercial, mobile homes, manufactured, etc. from all results
        $listings = $listings -> where('PropertyType', 'not like', '%commercial%')
        //-> where('StructureDesignType', 'not like', '%Unit/Flat%')
            -> where('StructureDesignType', 'not like', '%mobile%')
            -> where('StructureDesignType', 'not like', '%manufactured%')
            -> where('StructureDesignType', 'not like', '%garage%')
            -> where('StructureDesignType', 'not like', '%storefront%')
            -> where('StructureDesignType', 'not like', '%other%')
            -> where('MlsStatus', 'active');

        // modified date
        if($start_from_datetime) {
            $date = substr($start_from_datetime, 0, 10) ?? NULL;
            $listings -> when($start_from_datetime, function ($q, $start_from_datetime) {
                return $q -> where('MajorChangeTimestamp', '>=', $start_from_datetime);
            });
            $listings -> when($date, function ($q, $date) {
                return $q -> where('MLSListDate', '>=', $date);
            });

        }


        // Locations
        $listings -> when($state, function ($q, $state) {
            return $q -> where('StateOrProvince', $state);
        });
        $listings -> when($city, function ($q, $city) {
            return $q -> where('City', $city);
        });
        $listings -> when($county, function ($q, $county) {
            return $q -> where('County', $county);
        });
        $listings -> when($zip, function ($q, $zip) {
            return $q -> where('PostalCode', $zip);
        });
        $listings -> when($subdivision, function ($q, $subdivision) {
            return $q -> where('SubdivisionName', $subdivision);
        });
        $listings -> when($coordinates, function($q, $coordinates) {
            return $q -> whereRaw("ST_CONTAINS(ST_GEOMFROMTEXT('POLYGON((".str_replace("#", ",", $coordinates)."))'), c_Coordinates)");
        });


        // For sale or not
        $listings -> when($for_sale == 'on' && $rentals == '', function ($q) {
            return $q -> where('PropertyType', 'not like', '%lease%');
        });
        $listings -> when($for_sale == '' && $rentals == 'on', function ($q) {
            return $q -> where('PropertyType', 'like', '%lease%');
        });
        $listings -> when($for_sale == 'on' && $rentals == 'on', function ($q) {
            return $q -> where('PropertyType', 'like', '%%');
        });
        // remove all results if for_sale and rentals are both not checked
        $listings -> when($for_sale == '' && $rentals == '', function ($q) {
            return $q -> where('PropertyType', 'like', '%xxxxxxxxxxxx%');
        });


        // Features
        $listings -> when($beds, function ($q, $beds) {
            return $q -> where('BedroomsTotal', '>=', $beds);
        });
        $listings -> when($baths, function ($q, $baths) {
            return $q -> where('BathroomsTotalInteger', '>=', $baths);
        });


        // Price range
        $listings -> when($min_price, function ($q, $min_price) {
            return $q -> where('ListPrice', '>=', $min_price);
        });
        $listings -> when($max_price, function ($q, $max_price) {
            return $q -> where('ListPrice', '<=', $max_price);
        });

        //Square Feet
        $listings -> when($sq_ft_min, function ($q, $sq_ft_min) {
            return $q -> where('LivingArea', '>=', $sq_ft_min);
        });
        $listings -> when($sq_ft_max, function ($q, $sq_ft_max) {
            return $q -> where('LivingArea', '<=', $sq_ft_max);
        });

        //Year built
        $listings -> when($year_built_min, function ($q, $year_built_min) {
            return $q -> where('YearBuilt', '>=', $year_built_min);
        });
        $listings -> when($year_built_max, function ($q, $year_built_max) {
            return $q -> where('YearBuilt', '<=', $year_built_max);
        });

        //Lot size
        $listings -> when($lot_size_min, function ($q, $lot_size_min) {
            return $q -> where('LotSizeSquareFeet', '>=', $lot_size_min);
        });
        $listings -> when($lot_size_max, function ($q, $lot_size_max) {
            return $q -> where('LotSizeSquareFeet', '<=', $lot_size_max);
        });


        // Property Type
        $listings -> when($detached != 'on', function ($q) {
            return $q -> where('StructureDesignType', 'not like', '%Detached%');
        });
        $listings -> when($apartments != 'on', function ($q) {
            return $q -> where('StructureDesignType', 'not like', '%Unit/Flat%');
        });
        $listings -> when($condos != 'on', function ($q) {
            return $q -> where('condoYN', 'N');
        });
        $listings -> when($townhouse != 'on', function ($q) {
            return $q -> where('StructureDesignType', 'not like', '%Townhouse%');
        });
        $listings -> when($land != 'on', function ($q) {
            return $q -> where('PropertyType', 'not like', '%land%');
        });
        $listings -> when($farms != 'on', function ($q) {
            return $q -> where('PropertyType', 'not like', '%farm%');
        });
        $listings -> when($multifamily != 'on', function ($q) {
            return $q -> where('PropertyType', 'not like', '%Multi-Family%');
        });
        $listings -> when($duplex != 'on', function ($q) {
            return $q -> where('StructureDesignType', 'not like', '%Semi-Detached%');
        });


        // Sale Type
        $listings -> when($standard != 'on', function ($q) {
            return $q -> where('SaleType', 'not like', '%standard%');
        });
        $listings -> when($new_construction != 'on', function ($q) {
            return $q -> where('NewConstructionYN', 'N');
        });
        $listings -> when($foreclosures != 'on', function ($q) {
            return $q -> where('SaleType', 'not like', '%REO%')
                -> where('SaleType', 'not like', '%HUD%')
                -> where('SaleType', 'not like', '%bankruptcy%')
                -> where('SaleType', 'not like', '%foreclosure%');
        });
        $listings -> when($short_sales != 'on', function ($q) {
            return $q -> where('SaleType', 'not like', '%third%');
        });
        $listings -> when($auction != 'on', function ($q) {
            return $q -> where('SaleType', 'not like', '%auction%');
        });


        return $listings;

    }

    public function scopeSchool($query, $state, $lat, $lon) {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.greatschools.org/schools/nearby?key=1a2572cc806dcc701097d7d8cad6b81c&state=".$state."&lat=".$lat."&lon=".$lon,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Accept: */*",
                "Content-type: application/json",
                "Cache-Control: no-cache",
                "Connection: keep-alive",
                "Host: api.greatschools.org",
                "Postman-Token: e768ee75-03d0-4526-8ffc-e318e565b844,bab5a7e4-a0cf-42f8-9765-6078bf583ea7",
                "User-Agent: PostmanRuntime/7.15.0",
                "accept-encoding: gzip, deflate"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // response is xml so convert to json
        $xml = simplexml_load_string($response);
        $json = json_encode($xml);
        $results = json_decode($json, true);
        return $results;
    }

}
