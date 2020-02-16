<?php


namespace Package\Repository;

use App\Job;
use Package\Entity\JobEntity;

class JobRepository
{
    public function findBy($corpId)
    {
        return Job::query()->where('corp_id', $corpId)->get();
    }

    public function save(JobEntity $entity)
    {
        $job = new Job();
        $job->id = $entity->getId();
        $job->corp_id = $entity->getCorpId();
        $job->name = $entity->getName();
        $job->status = $entity->status();
        $job->save();
    }
}
