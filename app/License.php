<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\License
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\License newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\License newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\License query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\License whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\License whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\License whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\License whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class License extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_license');
    }
}
