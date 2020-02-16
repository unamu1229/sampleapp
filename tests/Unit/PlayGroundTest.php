<?php

namespace Tests\Unit;

use App\Events\PreUserChange;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PlayGroundTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @throws \Throwable
     */
    public function testExample()
    {
        echo "--------------\n";
        print_r(strip_tags(view('test')->render()));
        Carbon::createFromFormat('Y-m-d', '2020-1-1')->toDateString();
        $test = 7;
        collect()->first(function ($val) use ($test) {
            return $val->id == $test;
        });
        echo "--------------\n";


//        $this->assertTrue(true);
//
//        /** @var User $user */
//        $user = User::find(1);
//        $user->name = 'test';
//        $user->email = 'test@email';
//        $preUser = clone $user;
//        $user->save();
//        event(new PreUserChange($preUser));
    }
}
