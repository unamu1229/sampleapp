<?php

namespace Tests\Unit\Domain\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
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
    public function testChangeGender_rollback_queue()
    {
        try {
            DB::beginTransaction();
            $user = User::memberEntry($this->faker->uuid, $this->faker->name, $this->faker->email, Gender::of(Gender::WOMAN));
            $user->editProfile('unamu', 25, Gender::of(Gender::WOMAN));
            $user->changeGender(Gender::of(Gender::MAN));
            $user->validate(new ExceptionValidationNotificationHandler());
            DB::commit();
        } catch (ValidationException $exception) {
            DB::rollBack();
            throw $exception;
        }
    }
}
