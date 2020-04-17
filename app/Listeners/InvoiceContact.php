<?php

namespace App\Listeners;

use App\Corp;
use App\Events\CorpUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvoiceContact
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
     * @param  CorpUpdated  $event
     * @return void
     */
    public function handle(CorpUpdated $event)
    {
        Corp::addVersion();
    }
}
