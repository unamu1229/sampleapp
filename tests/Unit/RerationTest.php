<?php

namespace Tests\Unit;

use App\License;
use App\Tag;
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

    public function test_reverse()
    {
        $license = License::query()->find(1);
        foreach ($license->users as $user) {
            $this->assertTrue(is_numeric($user->id));
        }
    }

    public function test_has_one_through()
    {
        $tag = Tag::query()->find(1);
        $this->assertEquals(7000, $tag->userSalary->salary);
    }

    public function test_has_many_through()
    {
        $tag = Tag::query()->find(1);
        print_r($tag->userLicenses->pluck('license_id'));
    }
}
