<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\QuerySelection
 *
 * @property int $id
 * @property int|null $is_client_agree
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuerySelection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuerySelection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuerySelection query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuerySelection whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QuerySelection whereIsClientAgree($value)
 * @mixin \Eloquent
 */
class QuerySelection extends Model
{
    public $timestamps = false;
}
