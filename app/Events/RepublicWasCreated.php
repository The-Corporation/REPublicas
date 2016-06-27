<?php

namespace Republicas\Events;

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;
use Republicas\Events\Event;
use Republicas\Models\Republic;

class RepublicWasCreated extends Event
{
    use SerializesModels;

    protected $republic;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Republic $republic)
    {
        $this->republic = $republic;
    }

    /**
     * Gets the republic.
     *
     * @return     Republic::class  The republic.
     */
    public function getRepublic()
    {
        return $this->republic;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
