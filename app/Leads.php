<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    protected $connection = 'leads';
    protected $table = 'leads';
    public $timestamps = false;
}
