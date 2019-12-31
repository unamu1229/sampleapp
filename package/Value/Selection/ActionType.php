<?php


namespace Package\Value\Selection;

use Package\Value\Enum;

/**
 * アクションタイプ
 * Class ActionType
 * @package Package\Value\Selection
 */
class ActionType
{
    use Enum;

    const CUSTOMER = 'カスタマー';
    const CLIENT = 'クライアント';


    public function __construct(string $value)
    {
        if (!$this->inValues($value)) {
            throw new \DomainException('選考のアクションタイプに対応していません');
        }
        $this->value = $value;
    }
}
