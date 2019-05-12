<?php

use Illuminate\Database\Seeder;

class LineStationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\App\Station $station, \App\Line $line)
    {
        foreach ($station->all() as $s) {
            foreach ($line->all() as $l) {

                if (rand(0,1)) {
                    var_dump('skip');
                    var_dump($l->id);
                    var_dump($s->id);
                    continue;
                }

                $lineStation = new \App\LineStation();
                $lineStation->station_id = $s->id;
                $lineStation->line_id = $l->id;
                $lineStation->save();
            }
        }
    }
}
