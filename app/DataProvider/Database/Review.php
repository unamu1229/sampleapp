<?php

namespace App\DataProvider\Database;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DataProvider\Database\Review
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $content
 * @property string|null $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProvider\Database\Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProvider\Database\Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProvider\Database\Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProvider\Database\Review whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProvider\Database\Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProvider\Database\Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProvider\Database\Review whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProvider\Database\Review whereUserId($value)
 * @mixin \Eloquent
 */
class Review extends Model
{
    /** @var string */
    protected $table = 'reviews';

    /** @var bool  */
    public $timestamps = false;

    /** @var array  */
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'created_at',
    ];
}
