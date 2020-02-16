<?php


namespace Package\Repository;

use App\Corp;
use App\Qcorp;
use Package\Entity\CorpEntity;
use Package\Entity\Query\CorpEntity as QCorpEntity;
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
        $corp->save();
    }
}
