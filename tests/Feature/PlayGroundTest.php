<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PlayGroundTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $collection = collect(['dog', 'cat', 'apple', 'google']);
        $collection = $collection->merge(collect('banana'));
        var_dump($collection);
        $this->assertTrue(true);
    }
}
