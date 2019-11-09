<?php

namespace Tests\Unit;

use App\Events\PreUserChange;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PlayGroundTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);

        /** @var User $user */
        $user = User::find(1);
        $user->name = 'test';
        $user->email = 'test@email';
        $preUser = clone $user;
        $user->save();
        event(new PreUserChange($preUser));
    }
}
