<?php

namespace Republicas\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Republicas\Events\RepublicWasCreated;
use Republicas\Models\Room;

class CreateRoomsListener
{
    /**
     * Handle the event.
     *
     * @param  RepublicWasCreated  $event
     * @return void
     */
    public function handle(RepublicWasCreated $event)
    {
        $republic = $event->getRepublic();

        for ($i=0; $i < $republic->simple_rooms; $i++) {
            Room::create(['republic_id' => $republic->id, 'num_beds' => 1, 'type' => 'normal', 'price' => 0.00]);
        }

         for ($i=0; $i < $republic->suite_rooms; $i++) {
            Room::create(['republic_id' => $republic->id, 'num_beds' => 1, 'type' => 'suite', 'price' => 0.00]);
        }
    }
}
