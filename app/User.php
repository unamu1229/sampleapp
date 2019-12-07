<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function licenses()
    {
        return $this->belongsToMany(License::class, 'user_license')
            ->using(UserLicense::class)
            ->withPivot(['type'])
            ->withTimestamps();
    }

    public function licensesFromActive()
    {
        return $this->belongsToMany(License::class, 'user_license')
            ->wherePivot('type', '=', 'active');
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class)->withDefault();
        //return $this->belongsTo(Tag::class);
    }
}
