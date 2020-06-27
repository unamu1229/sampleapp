<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Station
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Line[] $lines
 * @property-read int|null $lines_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Station newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Station newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Station query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Station whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Station whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Station whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Station whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Station extends Model
{
    //
    public function lines()
    {
        return $this->belongsToMany(Line::class, 'line_stations');
    }
}
