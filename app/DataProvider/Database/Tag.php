<?php

namespace App\DataProvider\Database;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DataProvider\Database\Tag
 *
 * @property int $id
 * @property string $tag_name
 * @property string|null $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProvider\Database\Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProvider\Database\Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProvider\Database\Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProvider\Database\Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProvider\Database\Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProvider\Database\Tag whereTagName($value)
 * @mixin \Eloquent
 */
class Tag extends Model
{
    /** @var string */
    protected $table = 'tags';

    public $timestamps = false;

    /** @var array  */
    protected $fillable = [
        'tag_name',
        'created_at',
    ];
}
