<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShowingRequests extends Model
{
    protected $connection = 'taylorproperties';
    protected $table = 'users_showing_requests';
}
