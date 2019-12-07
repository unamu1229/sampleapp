<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RerationTest extends TestCase
{
    public function test_simple()
    {
        $user = User::query()->where('id', 1)->first();
        foreach ($user->simpleLicenses as $license) {
            $this->assertTrue(in_array($license->pivot->type, ['active', 'wish', 'pending']));
        }
    }
}
