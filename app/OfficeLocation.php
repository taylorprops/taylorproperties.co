<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfficeLocation extends Model
{
    protected $connection = 'taylorproperties';
    protected $table = 'office_locations';
}
