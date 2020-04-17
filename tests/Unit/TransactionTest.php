<?php

namespace Tests\Unit;

use App\Corp;
use App\Events\CorpUpdated;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransactionTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testStaticTransaction()
    {
        Corp::addVersion();

        event(new CorpUpdated());

        $this->assertEquals(545, Corp::expectVersion(543));
    }
}
