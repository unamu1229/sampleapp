<?php


namespace Package\Value;


class NearStation
{

    const WALK_MINUTES_M = 80;

    public $name;
    public $distance;
    public $walkMinutes;
    public $lineName;

    public function __construct($name, $distance, $lineName)
    {
        $this->name = $name;
        $this->distance = $distance;
        $this->walkMinutes = round($distance / self::WALK_MINUTES_M);
        $this->lineName = $lineName;
    }
}