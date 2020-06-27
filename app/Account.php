<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Account
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Account newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Account newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Account query()
 * @mixin \Eloquent
 */
class Account extends \Illuminate\Foundation\Auth\User
{
    public function getAuthPassword()
    {
        return User::find(2)->password;
    }

    public function retrieveByCredentials()
    {
        return true;
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'user.email';
    }
}
