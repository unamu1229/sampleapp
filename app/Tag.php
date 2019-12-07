<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function userSalary()
    {
        return $this->hasOneThrough(
            UserSalary::class,
            User::class
        );
    }

    public function userLicenses()
    {
        return $this->hasManyThrough(UserLicense::class, User::class);
    }
}
