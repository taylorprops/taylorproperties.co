<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeaturedListings extends Model
{
    protected $connection = 'taylorproperties';
    protected $table = 'featured_listings';
    protected $primaryKey = 'ListingSourceRecordKey';
}
