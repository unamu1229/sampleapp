<?php

namespace Tests\Unit;

use App\Job;
use App\License;
use App\Service\UserService;
use App\User;
use Mockery\MockInterface;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MockeryTest extends TestCase
{
    /**
     * andReturnは何回目の実行かによって返す値を設定できる
     *
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function testAndReturn()
    {
        $this->mock(User::class, function (MockInterface $mock) {
            $mock->shouldReceive('licenses')->andReturn('aws', 'db', 'php');
        });

        $user = $this->app->make(User::class);

        $this->assertSame('aws', $user->licenses());
        $this->assertSame('db', $user->licenses());
        $this->assertSame('php', $user->licenses());
    }

    /**
     * makePartialで一部分だけモックできる
     *
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function testMakePartial()
    {
        $licenses = collect(['aws', 'db', 'php']);
        $user = new User();
        $user->setAttribute('licenses', $licenses);

        // getUserメソッドだけモックすることでuserLicenseのテストをする
        $userService = $this->mock(UserService::class, function (MockInterface $mock) use ($user) {
            $mock->makePartial()->shouldReceive('getUser')->andReturn($user);
        });

        //
        // $userService = $this->app->make(UserService::class);

        $licenses = $userService->userLicenses('777');

        $this->assertSame('aws', $licenses[0]);
        $this->assertSame('db', $licenses[1]);
        $this->assertSame('php', $licenses[2]);
    }

    /**
     * 返り値に対して更にモックをする
     */
    public function testMockReturnOfMock()
    {
        $this->mock(User::class, function (MockInterface $mock) {
            // makePartialを利用することでプロパティをセットできる
            $mock->makePartial();
            $mock->name = 'yoneda';

            // 返り値に$mockを渡すことで、その返り値に対して処理を行っているところをモックできる。
            $mock->shouldReceive('query->where->first')->andReturn($mock);
            $mock->shouldReceive('licenses->where->first')->andReturn(factory(License::class)->make(['name' => 'aws']));
        });

        $license = UserService::userLicenseByName(100, 'yoneda');

        $this->assertSame('aws', $license->name);
    }

    public function testDuplicateMethodChain()
    {
        $this->mock(User::class, function (MockInterface $mock) {
            $mock->makePartial();
            $mock->name = 'yoneda';

            $mock->shouldReceive('query->where->first')->andReturn($mock);
            
            $mock->shouldReceive('licenses->job->where->with->first')->andReturn(factory(License::class)->make(['name' => 'php']));

            //         このやりかただと licenses->where-> の次がfirstかwhereの場合があるので失敗する
            $mock->shouldReceive('licenses->job->where->first')->andReturn(factory(License::class)->make(['name' => 'aws']));
            $mock->mainLicense = factory(License::class)->make();



            /*
                        $mock->shouldReceive('licenses->where')->andReturn($mock);
                        $mock->shouldReceive('first')->andReturn(factory(License::class)->make(['name' => 'aws']));
                        $mock->shouldReceive('where->first')->andReturn(factory(License::class)->make(['name' => 'php']));
                        */
        });

        $this->mock(Job::class, function (MockInterface $mock) {
            $mock->shouldReceive('query->where->first');
        });

        $licenses = UserService::userLicenseCombine(100, 'yoneda');

        $this->assertSame('php', $licenses->pluck('name')[0]);
        $this->assertSame('aws', $licenses->pluck('name')[1]);
    }
}
