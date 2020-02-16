<?php


namespace Package\Repository;

use App\Corp;
use Package\Entity\CorpEntity;
use Package\Service\IsExistActiveJob;

class CorpRepository
{
    private $isExistActiveJob;

    public function __construct(IsExistActiveJob $isExistActiveJob)
    {
        $this->isExistActiveJob = $isExistActiveJob;
    }

    public function save(CorpEntity $corpEntity)
    {
        $corp = new Corp();
        $corp->id = $corpEntity->getId();
        $corp->is_active = $corpEntity->isActive($this->isExistActiveJob);
        $corp->save();
    }

    /**
     * @param string $corpId
     * @return CorpEntity
     */
    public function fetch(string $corpId): CorpEntity
    {
        $corp = Corp::query()->where('id', $corpId)->first();
        return new CorpEntity($corp->id);
    }
}
