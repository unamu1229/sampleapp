<?php

namespace Package\Event\Job;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Package\Entity\CorpEntity;
use Package\Entity\JobEntity;

class CreatedJob
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $jobEntity;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(JobEntity $jobEntity)
    {
        $this->jobEntity = $jobEntity;
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
