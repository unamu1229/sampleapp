<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    //
    public function lines()
    {
        return $this->belongsToMany(Line::class, 'line_stations');
    }
}
