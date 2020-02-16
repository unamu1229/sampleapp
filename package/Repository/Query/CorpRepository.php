<?php


namespace Package\Repository\Query;

use App\Corp;
use App\Qcorp;
use Package\Entity\Query\CorpEntity;
use Package\Service\IsExistActiveJob;

class CorpRepository
{
    private $isExistActiveJob;

    public function __construct(IsExistActiveJob $isExistActiveJob)
    {
        $this->isExistActiveJob = $isExistActiveJob;
    }

    public function fetch(string $corpId): CorpEntity
    {
        $corp = Corp::query()->where('id', $corpId)->first();
        return new CorpEntity($corp->id);
    }

    public function save(CorpEntity $entity)
    {
        $corp = Qcorp::query()->where('id', $entity->getId())->first();
        if (!$corp) {
            $corp = new Qcorp();
            $corp->id = $entity->getId();
        }
        $corp->is_active = $entity->isActive($this->isExistActiveJob);
        $corp->save();
    }
}
