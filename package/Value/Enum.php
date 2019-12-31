<?php


namespace Package\Value;

trait Enum
{
    public $value;

    public static function values(): array
    {
        $class = new \ReflectionClass(__CLASS__);
        return $class->getConstants();
    }

    public static function inValues($value): bool
    {
        return in_array($value, self::values(), true);
    }

    public function value()
    {
        return $this->value;
    }
}
