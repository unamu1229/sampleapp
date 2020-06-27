<?php

namespace App;

use App\Events\SelectionSaved;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Selection
 *
 * @property string $id
 * @property int $version
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SelectionHistory[] $selectionHistories
 * @property-read int|null $selection_histories_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Selection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Selection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Selection query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Selection whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Selection whereVersion($value)
 * @mixin \Eloquent
 */
class Selection extends Model
{
    public $timestamps = false;

    public $incrementing = false;

    protected $dispatchesEvents = [
        'saved' => SelectionSaved::class
    ];


    public function selectionHistories()
    {
        return $this->hasMany(SelectionHistory::class);
    }
}
