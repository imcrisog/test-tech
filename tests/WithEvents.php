<?php

namespace Tests;

use App\Models\Event;
use App\Models\Order;

trait WithEvents
{

    protected function createEventOnly()
    {
        $event = Event::factory()->create();
        return $event;
    }

    protected function createEventsAndOrders(int $numberOfEvents = 1, int $numerEdit = 0) 
    {
        for ($i = 0; $i < $numberOfEvents; $i++) { 
            $event = Event::factory()->create();
            $event->total_tickets += $numerEdit;
            $event->save();

            $order1 = Order::factory()->create();
            $order1->event()->associate($event);
            $order1->save();

            $order2 = Order::factory()->create();
            $order2->event()->associate($event);
            $order2->save();
        }

        return $event;
    }   

    protected function deleteEventAndOrders(mixed $event, mixed $orders)
    {
        foreach ($orders as $order) {
            $order->delete();
        }

        $event->delete();
    }
}