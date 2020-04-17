<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corp extends Model
{
    public $incrementing = false;

    private static $addVersion = 0;

    public static function addVersion()
    {
        self::$addVersion += 1;
    }

    public static function expectVersion($currentVersion)
    {
        return self::$addVersion + $currentVersion;
    }
}
