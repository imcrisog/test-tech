<?php

namespace App\Repositories\Local;

class OrderRepository
{
    public function save_picture(mixed $picture)
    {
        $picture_path = $picture->store('pictures');
        
        return $picture_path;
    }

    protected function tickets_total($orders)
    {
        $count = 0;

        foreach ($orders as $order) {
            $count += $order->quantity_of_tickets;
        }

        return $count;
    }

    public function get_tickets($event, $orders)
    {
        return $event->total_tickets - $this->tickets_total($orders);
    }

    public function attempt_create($event, $orders, $quantity)
    {
        if ($orders->count() < 0) {
            return true;
        }

        if ($quantity > $event->total_tickets) {
            return false;
        }

        if (($this->tickets_total($orders) + $quantity) > $event->total_tickets) {
            return false;
        }

        return true;
    }
}