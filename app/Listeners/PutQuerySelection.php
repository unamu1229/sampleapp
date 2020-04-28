<?php

namespace App\Listeners;

use App\Events\PutCommandSelection;
use App\Selection;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Package\Domain\Selection\QuerySelection;
use Package\Repository\QuerySelectionRepository;

class PutQuerySelection implements ShouldQueue
{
    private $querySelectionRepository;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(QuerySelectionRepository $querySelectionRepository)
    {
        $this->querySelectionRepository = $querySelectionRepository;
    }

    /**
     * Handle the event.
     *
     * @param  PutCommandSelection  $event
     * @return void
     */
    public function handle(PutCommandSelection $event)
    {
        $querySelection = QuerySelection::generate(Selection::query()->find($event->selectionId));
        $this->querySelectionRepository->put($querySelection);
    }
}
