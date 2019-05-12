<?php

namespace Tests\Unit;

use App\Station;
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
        $this->app->call([new UserService(), 'send'], ['abe@com', 'hello']);
        $this->assertTrue(true);
    }

    public function testNearStation()
    {
        $station = new Station();
        $station = $station->where("id", 2)->first();

        $nearStations = [];
        foreach ($station->lines as $line) {
            $nearStations[] = new NearStation(
                $station->name,
                rand(50, 1500),
                $line->name
            );
        }

        print_r($nearStations);
    }
}
