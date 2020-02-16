<?php


namespace App\Service;

use Package\Entity\CorpEntity;
use Package\Repository\CorpRepository;
use Package\Repository\JobRepository;
use Ramsey\Uuid\Uuid;

class CorpService
{
    private $corpRepository;
    private $jobRepository;

    public function __construct(CorpRepository $corpRepository, JobRepository $jobRepository)
    {
        $this->corpRepository = $corpRepository;
        $this->jobRepository = $jobRepository;
    }

    public function create()
    {
        $corpEntity = new CorpEntity(Uuid::uuid4()->toString());
        $this->corpRepository->save($corpEntity);
        $job = $corpEntity->createJob();
        $this->jobRepository->save($job);
    }
}
