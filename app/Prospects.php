<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prospects extends Model
{
    protected $connection = 'company';
    protected $table = 'prospects';
    public $timestamps = false;
}
