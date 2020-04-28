<?php

namespace App\Listeners;

use App\Events\PushCommandSelection;
use App\QuerySelection;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PushQuerySelection implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PushCommandSelection  $event
     * @return void
     */
    public function handle(PushCommandSelection $event)
    {
        $querySelection = new QuerySelection();
        $querySelection->id = $event->selectionId;
        $querySelection->save();
    }
}
