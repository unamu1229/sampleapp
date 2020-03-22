<?php

namespace Tests\Unit\Domain\User;

use Package\Domain\ExceptionValidationNotificationHandler;
use Package\Domain\User\Gender;
use Package\Domain\User\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserValidatorTest extends TestCase
{
    use WithFaker;

    /**
     * @expectedException \Illuminate\Validation\ValidationException
     */
    public function testHasWarpedManAgeCondition()
    {
        $user = User::memberEntry($this->faker->uuid, $this->faker->name, $this->faker->email, Gender::of(Gender::MAN));
        $user->editProfile('unamu', 25, Gender::of(Gender::MAN));
        $user->validate(new ExceptionValidationNotificationHandler());
    }

    /**
     * @expectedException \Illuminate\Validation\ValidationException
     */
    public function testChangeGender()
    {
        $user = User::memberEntry($this->faker->uuid, $this->faker->name, $this->faker->email, Gender::of(Gender::WOMAN));
        $user->editProfile('unamu', 25, Gender::of(Gender::WOMAN));
        $user->changeGender(Gender::of(Gender::MAN));
        $user->validate(new ExceptionValidationNotificationHandler());
    }

    //todo イベントのキューをトランザクションでロールバックできるか
}
