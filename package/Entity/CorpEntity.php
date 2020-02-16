<?php


namespace Package\Entity;

use Package\Event\Job\CreatedJob;
use App\Job;
use Package\Service\IsExistActiveJob;
use Package\Value\Job\Status;

/**
 * 会社
 * Class CorpEntity
 * @package Package\Entity
 */
class CorpEntity
{

    /**
     * 会社ID
     * @var string
     */
    private $id;

    public function __construct(string $id)
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
     * 求人を作成する
     * @return JobEntity
     */
    public function createJob(): JobEntity
    {
        $jobEntity = new JobEntity(JobEntity::createId(), $this->id, 'doctor', new Status(Status::active));
        Job::saved(function () use ($jobEntity) {
            event(new CreatedJob($jobEntity));
        });
        return $jobEntity;
    }
}
