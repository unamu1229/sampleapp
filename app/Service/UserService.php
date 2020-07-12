<?php


namespace App\Service;

use App\Job;
use App\User;

/**
 * モックのテストサンプル用
 *
 * Class UserService
 * @package App\Service
 */
class UserService
{
    /**
     * @param $id
     * @return User|\Illuminate\Database\Eloquent\Model
     */
    public function getUser($id): User
    {
        return User::query()->where('id', $id)->firstOrFail();
    }


    public function userLicenses($id)
    {
        return $this->getUser($id)->licenses;
    }

    public static function userLicenseByName($id, $name)
    {
        /** @var User $user */
        $user = app()->make(User::class)->query()->where('id', $id)->first();

        if ($user->name === $name) {
            return $user->licenses()->where('name', 'aws')->first();
        }

        return null;
    }


    public static function userLicenseCombine($id, $name)
    {   /** @var User $user */
        $user = app()->make(User::class)->query()->where('id', $id)->first();
        $aws = $user->licenses()->job()->where('name', 'aws')->first();
        $aws_id = $aws->id;
        $license = $user->mainLicense;
        $job = app()->make(Job::class)->query()->where()->first();
        $php = $user->licenses()->job()->where('name', 'php')->with()->first();



        return collect([$php, $aws]);
    }
}
