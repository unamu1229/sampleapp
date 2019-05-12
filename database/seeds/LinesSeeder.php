<?php

use Illuminate\Database\Seeder;

class LinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\Faker\Factory $faker)
    {
        \Illuminate\Support\Facades\DB::table('lines')->delete();

        $faker = $faker::create();

        for ($i = 0; $i <= 10; $i++) {
            $line = new \App\Line();
            $line->name = $faker->name;
            $line->save();
        }
    }
}
