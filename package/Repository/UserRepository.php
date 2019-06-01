<?php


namespace Package\Repository;


use App\User;
use Package\Service\CustomerFactory;

class UserRepository
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function test()
    {
        static $user;

        if (!$user) {
            $user = $this->user->all();
        }

        return $user;
    }


    public function test2()
    {
        return $this->user->all();
    }

}