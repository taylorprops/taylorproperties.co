<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $connection = 'taylorproperties';
    protected $table = 'agents';
    protected $primaryKey = 'id';
}
