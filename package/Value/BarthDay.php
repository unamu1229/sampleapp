<?php


namespace Package\Value;


class BarthDay
{
    private $value;

    public function __construct(int $year, int $month, int $day)
    {
        if (!checkdate($month, $day, $year)) {
            throw new \DomainException('これはあかん');
        }

        $this->value = new \DateTime("$year-$month-$day");
    }

    public function value()
    {
        return $this->value;
    }
}
