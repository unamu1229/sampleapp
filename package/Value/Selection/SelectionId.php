<?php


namespace Package\Value\Selection;

use Ramsey\Uuid\Uuid;

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

    /**
     * セレクションIDを新たに生成
     * @return SelectionId
     * @throws \Exception
     */
    public static function create(): self
    {
        return new self(Uuid::uuid4());
    }
}
