<?php

namespace App;

use App\Events\SelectionSaved;
use Illuminate\Database\Eloquent\Model;

class Selection extends Model
{
    public $timestamps = false;

    public $incrementing = false;

    protected $dispatchesEvents = [
        'saved' => SelectionSaved::class
    ];


    public function selectionHistories()
    {
        return $this->hasMany(SelectionHistory::class);
    }
}
