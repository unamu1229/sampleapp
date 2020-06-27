<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Corp
 *
 * @property string $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Corp newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Corp newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Corp query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Corp whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Corp whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Corp whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
