<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Qcorp
 *
 * @property string $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $is_active
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Qcorp newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Qcorp newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Qcorp query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Qcorp whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Qcorp whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Qcorp whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Qcorp whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Qcorp extends Model
{
    public $incrementing = false;
}
