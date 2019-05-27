<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
