<?php


namespace Package\Domain\User;

use Package\Domain\Validator;

class UserValidator extends Validator
{
    private $user;

    public function __construct(User $user, $notification)
    {
        parent::__construct($notification);
        $this->user = $user;
    }

    public function validate()
    {
        if ($this->hasWarpedManAgeCondition($this->user->getAge(), $this->user->getGender()->value())) {
            $this->getNotificationHandler()->handleError('30歳未満の男性は登録できません');
        }

        if ($this->hasWarpedWomanAgeCondition($this->user->getAge(), $this->user->getGender()->value())) {
            $this->getNotificationHandler()->handleError('25歳未満の女性は登録できません');
        }
    }

    public function hasWarpedManAgeCondition($age, $gender)
    {
        return $age < 30 && $gender === Gender::MAN;
    }

    public function hasWarpedWomanAgeCondition($age, $gender)
    {
        return $age < 25 && $gender === Gender::WOMAN;
    }
}
