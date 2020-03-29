<?php

namespace Package\Domain\User;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ChangeGender
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $preGender;

    public $newGender;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($preGender, $newGender)
    {
        $this->preGender = $preGender;
        $this->newGender = $newGender;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
