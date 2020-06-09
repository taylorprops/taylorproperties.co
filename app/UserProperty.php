<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProperty extends Model
{
    protected $connection = 'taylorproperties';
    protected $table = 'users_properties';

    public function users_properties()
    {
        return $this -> belongsTo('App\User');
    }
}
