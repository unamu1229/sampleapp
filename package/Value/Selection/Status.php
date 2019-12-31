<?php


namespace Package\Value\Selection;

use Package\Value\Enum;

class Status
{
    use Enum;

    const ENTRY = 'エントリー';
    const SELECTION = '選考';
    const FAILURE = '不合格';
    const ADOPT = '採用';


    public function __construct(string $value)
    {
        if (!$this->inValues($value)) {
            throw new \DomainException('選考ステータスの値が不正です。');
        }

        $this->value = $value;
    }
}
