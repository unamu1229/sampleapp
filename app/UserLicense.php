<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\UserLicense
 *
 * @property int $user_id
 * @property int $license_id
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserLicense newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserLicense newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserLicense query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserLicense whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserLicense whereLicenseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserLicense whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserLicense whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserLicense whereUserId($value)
 * @mixin \Eloquent
 */
class UserLicense extends Pivot
{
    public function getTypeAttribute($value)
    {
        return "[{$value}]";
    }
}
