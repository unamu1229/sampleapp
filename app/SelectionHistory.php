<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectionHistory extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'selection_id';
}
