<?php


namespace Package\Value\Job;

use Package\Value\Enum;

class Status
{
    use Enum;

    const active = '掲載中';
    const stop = '非掲載中';

    public function __construct($value)
    {
        if (!$this->inValues($value)) {
            throw new \DomainException('不正なデータです。');
        }
        $this->value = $value;
    }
}
