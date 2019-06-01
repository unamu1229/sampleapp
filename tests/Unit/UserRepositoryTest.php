<?php

namespace Tests\Unit;

use Package\Repository\UserRepository;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserRepositoryTest extends TestCase
{

    /** @var UserRepository */
    private $userRepo;

    public function setUp(): void
    {
        parent::setUp();
        $this->userRepo = $this->app->make(UserRepository::class);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {

        $time_start = microtime(true);

        echo 'test--';
        for ($i=0; $i < 100; $i++) {
            $this->userRepo->test();
        }

        $time = microtime(true) - $time_start;
        echo "{$time} 秒";

        $this->assertTrue(true);
    }


    public function test2ex()
    {

        echo 'test2--';
        $time_start = microtime(true);

        for ($i=0; $i < 100; $i++) {
            $this->userRepo->test2();
        }

        $time = microtime(true) - $time_start;
        echo "{$time} 秒";

        $this->assertTrue(true);
    }
}
