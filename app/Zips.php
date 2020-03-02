<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zips extends Model
{
    protected $connection = 'taylorproperties';
    protected $table = 'zips';
}
