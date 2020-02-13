<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProperty extends Model
{
    protected $table = 'users_properties';

    public function users_properties()
    {
        return $this->belongsTo('App\User');
    }
}
