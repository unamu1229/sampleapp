<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    public function test_relation()
    {
        $this->assertTrue(true);
        $user = User::query()->where('id', 1)->first();

        //$user->licenses()->detach();
        //$user->licensesFromActive()->sync([1 => ['type' => 'active'], 2 => ['type' => 'active'], 3 => ['type' => 'active']]);

        //$user->licenses()->sync([1 => ['type' => 'pending']]);

        // 中間テーブルがuser_idとlicense_idとtypeの値でユニークになる場合に
        // syncを使うにはwherePivotでtypeを絞る。
        $user->licenses()->wherePivot('type', '=', 'active')->sync(
            [
                1 => ['type' => 'active'],
                2 => ['type' => 'active']
            ]
        );

        $user->licenses()->wherePivot('type', '=', 'wish')->sync(
            [
                1 => ['type' => 'wish'],
                2 => ['type' => 'wish'],
                3 => ['type' => 'wish']
            ]
        );
    }
}
