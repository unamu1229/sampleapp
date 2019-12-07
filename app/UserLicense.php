<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserLicense extends Pivot
{
    public function getTypeAttribute($value)
    {
        return "[{$value}]";
    }
}
