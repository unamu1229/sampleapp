<?php

namespace Tests\Unit;

use App\Station;
use Package\Entity\Recursion;
use Package\Value\NearStation;
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
        echo 'yes sync';
        $time_start = microtime(true);

        for ($i=0; $i < 10; $i++) {
            $recursion = new Recursion(1);

            $this->assertEquals(11, $recursion->getRecursionCount());

            $this->assertEquals(11, $recursion->count());
        }

        $time = microtime(true) - $time_start;
        echo "{$time} 秒";
    }
}
