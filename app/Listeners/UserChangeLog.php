<?php

namespace App\Listeners;

use App\Events\PreUserChange;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class UserChangeLog
{
    /**
     * Create the event listener.P
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
     * @param  PreUserChange  $event
     * @return void
     */
    public function handle(PreUserChange $event)
    {
        Log::channel('audit')->info('ユーザー変更内容audit', $event->user->getDirty());
    }
}
