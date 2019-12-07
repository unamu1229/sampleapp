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
        $user->licensesFromActive()->sync([1 => ['type' => 'active'], 2 => ['type' => 'active'], 3 => ['type' => 'active']]);

        //$user->licenses()->sync([1 => ['type' => 'pending']]);

        // 中間テーブルがuser_idとlicense_idとtypeの値でユニークになる場合に
        // syncを使うにはwherePivotでtypeを絞る。
        $user->licenses()->wherePivot('type', '=', 'active')->sync(
            [
                1 => ['type' => 'active'],
                2 => ['type' => 'active'],
                3 => ['type' => 'active'],
            ]
        );

        $user->licenses()->wherePivot('type', '=', 'wish')->sync(
            [
                1 => ['type' => 'wish'],
                2 => ['type' => 'wish'],
                //3 => ['type' => 'wish']
            ]
        );
    }

    public function test_default()
    {
        $user = User::query()->where('id', 1)->first();
        // リレーションの定義でwithDefault()をつけとくと
        // $user->tag ? $user->tag->tag_name : null
        // のような呼び出し元でnullチェックとかしなくていい
        $this->assertEquals(null, $user->tag->tag_name);
    }

    // リレーションの定義、中間テーブルでpivotをextendして、リレーションの定義に
    // using と withPivot を付けることでリレーション先のモデルに中間テーブルの内容
    // を付け足しができる
    public function test_custom_model()
    {
        $user = User::query()->where('id', 1)->first();
        foreach ($user->licenses as $license) {
            $this->assertTrue(in_array($license->pivot->type, ['[active]', '[wish]', '[pending]']));
        }
    }
}
