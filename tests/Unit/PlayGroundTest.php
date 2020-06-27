<?php

namespace Tests\Unit;

use App\Events\PreUserChange;
use App\Job;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Log;
use Mockery\MockInterface;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PlayGroundTest extends TestCase
{
    //use DatabaseTransactions;

    /**
     * @throws \Throwable
     */
    public function testExample()
    {
        $this->mock(User::class, function (MockInterface $mock) {
            $mock->shouldReceive('licenses')->andReturn('aws', 'db', 'php');
        });

        $user = $this->app->make(User::class);

        $licenses = $user->licenses();
        print_r($licenses);
        print_r($licenses);
        print_r($licenses);



//        ini_set('display_errors', 0);
//        ini_set('error_reporting', E_ALL);
//        ini_set('memory_limit', '1M');
//
//
//        print_r(phpinfo());
//
//        $counter = 1;
//        while (true) {
//            $counter++;
//            if ($counter > 2) {
//                break;
//            }
//		print(1);
//           // $job = new Job();
//        }
//
//        print_r($counter);
    }
}
