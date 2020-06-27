<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Tag
 *
 * @property int $id
 * @property string $tag_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\UserLicense[] $userLicenses
 * @property-read int|null $user_licenses_count
 * @property-read \App\UserSalary|null $userSalary
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag whereTagName($value)
 * @mixin \Eloquent
 */
class Tag extends Model
{
    public function userSalary()
    {
        return $this->hasOneThrough(
            UserSalary::class,
            User::class
        );
    }

    public function userLicenses()
    {
        return $this->hasManyThrough(UserLicense::class, User::class);
    }
}
