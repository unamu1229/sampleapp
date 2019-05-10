<?php

namespace App\DataProvider\Database;

use Illuminate\Database\Eloquent\Model;

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
