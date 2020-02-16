<?php

namespace Tests\Unit;

use App\Service\CorpService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CorpServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $corpService = $this->app->make(CorpService::class);
        $corpService->create();
        $this->assertTrue(true);
    }
}
