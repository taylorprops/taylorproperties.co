<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeadsNotes extends Model
{
    protected $connection = 'leads';
    protected $table = 'notes';
    public $timestamps = false;
}
