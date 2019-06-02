<?php

namespace Tests\Unit;

use App\Http\ProfileCommandService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfileCommandServiceTest extends TestCase
{
    /** @var ProfileCommandService */
    private $profileCommandService;

    public function setUp(): void
    {
        parent::setUp();
        $this->profileCommandService = $this->app->make(ProfileCommandService::class);
    }

    public function testEdit()
    {
        $this->profileCommandService->edit([
            'name' => 'hahaha',
            'email' => 'kutch.eldoras@example.org'
        ]);
        $this->assertTrue(true);
    }
}
