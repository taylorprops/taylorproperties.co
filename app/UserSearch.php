<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSearch extends Model {
    protected $connection = 'taylorproperties';
    protected $table = 'users_searches';

    public function users_searches() {
        return $this -> belongsTo('App\User');
    }
}
