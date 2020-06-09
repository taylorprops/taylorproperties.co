<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProspectNotes extends Model
{
    protected $connection = 'company';
    protected $table = 'prospect_notes';
    public $timestamps = false;
}
