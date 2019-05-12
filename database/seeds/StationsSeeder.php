<?php

use Illuminate\Database\Seeder;

class StationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\Faker\Factory $faker)
    {
        \Illuminate\Support\Facades\DB::table('stations')->delete();

        $faker = $faker::create();

        for ($i = 0; $i <= 10; $i++) {
            $station = new \App\Station();
            $station->name = $faker->name;
            $station->save();
        }

    }
}
