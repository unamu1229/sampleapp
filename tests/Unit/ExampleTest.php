<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Package\Service\UserService;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->app->call([new UserService(), 'send'], ['abe@com', 'hello']);
        $this->assertTrue(true);
    }
}
