<?php
declare(strict_types=1);
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        factory(\App\User::class, 10000)->create();
    }
}
