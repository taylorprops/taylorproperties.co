<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $connection = 'taylorproperties';
    protected $table = 'messages';
}
