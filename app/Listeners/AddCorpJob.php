<?php

namespace App\Listeners;

use App\Events\Package\Event\Job\CreatedJob;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Package\Repository\CorpRepository;

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
    public function handle(CreatedJob $event)
    {
        $corpEntity = $this->corpRepository->fetch($event->jobEntity->getCorpId());
        /**
         * 結局、複数求人を扱うことでトランザクションの問題があるから更新時にアクティブが残すのは無理
         * トランザクションをとらないようにcorpの外にis_activeを持っていくと、同時に求人を編集した際などにデータ不整合が起きる可能性がある。
         */
        $this->corpRepository->save($corpEntity);
    }
}
