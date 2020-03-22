<?php


namespace Package\Domain;

use DomainException;

trait Enum
{
    public $value;

    private function __construct($value)
    {
        if (!self::inValues($value)) {
            throw new DomainException('性別の値が不正です');
        }
        $this->value = $value;
    }

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

    /**
     * @param $value
     * @return self
     */
    public static function of($value): self
    {
        return new self($value);
    }
}
