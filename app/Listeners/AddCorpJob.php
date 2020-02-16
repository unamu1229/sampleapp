<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Package\Repository\Query\CorpRepository;

class AddCorpJob
{
    private $corpRepository;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(CorpRepository $corpRepository)
    {
        $this->corpRepository = $corpRepository;
    }

    /**
     * Handle the event.
     *
     * @param  CreatedJob  $event
     * @return void
     */
    public function handle(\Package\Event\Job\CreatedJob $event)
    {
        print_r('listen');
        $corpEntity = $this->corpRepository->fetch($event->jobEntity->getCorpId());
        $this->corpRepository->save($corpEntity);
    }
}
