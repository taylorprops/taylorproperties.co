<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeadsProperties extends Model
{
    protected $connection = 'leads';
    protected $table = 'properties';
    public $timestamps = false;
}
