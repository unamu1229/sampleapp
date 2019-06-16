<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SqlInjectionTest extends TestCase
{

    public function testExample()
    {

        $test = ['email'];

        $this->assertSame('alice83@example.org', User::orderByRaw("{$test[0]} ASC")->first()->email);

        // PDOはカラム名をバインドできない
        // @see https://www.84kure.com/blog/2015/09/29/php-pdo%E3%81%A7%E3%81%AF%E3%82%AB%E3%83%A9%E3%83%A0%E5%90%8D%E3%81%AB%E5%A4%89%E6%95%B0%E3%82%92%E3%83%90%E3%82%A4%E3%83%B3%E3%83%89%E3%81%A7%E3%81%8D%E3%81%AA%E3%81%84/
        $this->assertTrue(User::orderByRaw('? ASC', $test)->first() != 'alice83@example.org');

        // これはエラーになる、構造に対してもバインドできない
        // var_dump(User::orderByRaw('email ?', ['ASC'])->first()->email);

//        DB::enableQueryLog();

        // フィールド値に対してバインドできる
        $orderIds = [10, 14, 8];
        var_dump(User::whereIn('id', [10, 14, 8])->orderByRaw('FIELD(users.id, ?, ?, ?)', $orderIds)->first()->id);


        // フィールドの指定値に無いものは、インデックスの順番が最初（0）になる
        // https://dev.mysql.com/doc/refman/5.6/ja/string-functions.html#function_field
        $orderIds = [14, 8];
        $this->assertEquals([10, 14, 8],
            User::whereIn('id', [10, 14, 8])->orderByRaw('FIELD(id, ?, ?)', $orderIds)->pluck('id')->toArray()
        );

        // 名前付きプレースホルダーは効かないみたい
        $orderEmails = [':second' => 'kutch.eldoras@example.org', ':first' => 'stevie28@example.org', ':third' => 'ljenkins@example.net'];
        $this->assertEquals(
            [$orderEmails[':second'], $orderEmails[':first'], $orderEmails[':third']],
            User::whereRaw('email IN ("' . implode('", "', $orderEmails) . '")')->orderByRaw('FIELD(users.id, :first, :second, :third)', $orderEmails)->pluck('email')->toArray()
        );





//        var_dump(DB::getQueryLog());

        var_dump(test(1, 5));
    }
}
