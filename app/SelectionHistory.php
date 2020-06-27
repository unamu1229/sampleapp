<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\SelectionHistory
 *
 * @property int $selection_id
 * @property string $action_type
 * @property string $status
 * @property int $order
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SelectionHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SelectionHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SelectionHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SelectionHistory whereActionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SelectionHistory whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SelectionHistory whereSelectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SelectionHistory whereStatus($value)
 * @mixin \Eloquent
 */
class SelectionHistory extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'selection_id';
}
