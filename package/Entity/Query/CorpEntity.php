<?php


namespace Package\Entity\Query;

use Package\Service\IsExistActiveJob;

class CorpEntity
{
    /**
     * 会社ID
     * @var string
     */
    private $id;


    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }



    /**
     *
     * 求人を掲載しているか否かを表示のパフォーマンスのために更新時の判断しておく（アンチパターン）
     * @param IsExistActiveJob $activeJob
     * @return bool
     */
    public function isActive(IsExistActiveJob $activeJob): bool
    {
        return $activeJob->byCorp($this->id);
    }
}
