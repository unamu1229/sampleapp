<?php


namespace Package\Service;

use Package\Repository\JobRepository;
use Package\Value\Job\Status;

/**
 * 有効な求人があるか否か
 * Class IsExistActiveJob
 * @package Package\Service
 */
class IsExistActiveJob
{
    private $jobRepository;

    public function __construct(JobRepository $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }

    /**
     * @param $corpId
     * @return bool
     */
    public function byCorp($corpId): bool
    {
        $jobs = $this->jobRepository->findBy($corpId);
        if (!$jobs) {
            return false;
        }

        foreach ($jobs as $job) {
            if ($job->status === Status::active) {
                return true;
            }
        }

        return false;
    }
}
