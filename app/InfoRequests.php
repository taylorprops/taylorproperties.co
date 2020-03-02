<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoRequests extends Model
{
    protected $connection = 'taylorproperties';
    protected $table = 'users_info_requests';
}
