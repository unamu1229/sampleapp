<?php

namespace App\DataProvider\Database;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DataProvider\Database\ReviewTag
 *
 * @property int $review_id
 * @property int $tag_id
 * @property string|null $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProvider\Database\ReviewTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProvider\Database\ReviewTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProvider\Database\ReviewTag query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProvider\Database\ReviewTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProvider\Database\ReviewTag whereReviewId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DataProvider\Database\ReviewTag whereTagId($value)
 * @mixin \Eloquent
 */
class ReviewTag extends Model
{
    /** @var string */
    protected $table = 'review_tags';

    public $timestamps = false;

    /** @var array  */
    protected $fillable = [
        'review_id',
        'tag_id',
        'created_at',
    ];

    /**
     * @param int $reviewId
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function byReviewId(int $reviewId)
    {
        return $this->newQuery()
            ->join('reviews', 'review_tags.review_id', '=', 'reviews.id')
            ->join('tags', 'review_tags.tag_id', '=', 'tags.id')
            ->where('reviews.id', $reviewId)
            ->get(['tags.tag_name', 'tags.id']);
    }
}
