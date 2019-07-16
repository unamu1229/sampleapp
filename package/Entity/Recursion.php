<?php


namespace Package\Entity;

class Recursion
{
    private $count;

    /**
     * Recursionがネストして格納される
     *
     * @var Recursion
     */
    private $recursionCountValid;

    /**
     * 再帰的コンストラクタ
     *
     * Recursion constructor.
     * @param int $count
     */
    public function __construct(int $count)
    {
        $this->count = $count;
        if (!$this->validCount()) {
            $this->recursionCountValid = new self($this->count);
        }
    }

    /**
     * 一番深くネストされたRecursionからカウントを取り出す。
     *
     * @return int
     */
    public function getRecursionCount()
    {
        if ($this->recursionCountValid) {
            return $this->recursionCountValid->getRecursionCount();
        }
        return $this->getCount();
    }

    public function getCount()
    {
        return $this->count;
    }

    /**
     * カウントが10より大きいか否か
     */
    private function validCount()
    {
        if ($this->count > 10) {
            return true;
        }

        $this->count++;

        return false;
    }


    public function count()
    {
        static $counter = 0;
        $counter++;
        if ($counter > 10) {
            return $counter;
        }
        return $this->count();
    }
}
