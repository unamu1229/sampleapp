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
        $recursion = new Recursion(1);

        $this->assertEquals(11, $recursion->getRecursionCount());
    }
}
