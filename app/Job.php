<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Job
 *
 * @property int $id
 * @property string $queue
 * @property string $payload
 * @property int $attempts
 * @property int|null $reserved_at
 * @property int $available_at
 * @property \Illuminate\Support\Carbon $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereAttempts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereAvailableAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereQueue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereReservedAt($value)
 * @mixin \Eloquent
 */
class Job extends Model
{
    //
}
