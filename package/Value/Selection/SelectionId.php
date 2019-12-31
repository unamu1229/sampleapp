<?php


namespace Package\Value\Selection;

class SelectionId
{
    private $value;

    public function __construct(string $uuid)
    {
        $this->value = $uuid;
    }

    public function value()
    {
        return $this->value;
    }
}
