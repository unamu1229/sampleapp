<?php

namespace App\Listeners;

use Package\Domain\User\ChangeGender;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ChangeEntryBilling
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
     * @param  ChangeGender  $event
     * @return void
     */
    public function handle(ChangeGender $event)
    {
        //
    }
}
