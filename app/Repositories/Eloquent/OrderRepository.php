<?php

namespace App\Repositories\Eloquent;

use App\Models\Event;
use App\Models\Information;
use App\Models\Order;
use App\Repositories\Interfaces\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{
    public function find(int $id)
    {
        try {
            return Order::query()->findOrFail($id);
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function store(array $data, array $personal_data, int $id)
    {
        $event = Event::find($id);
        $order = Order::query()->create($data);

        $order->event()->associate($event);
        $order->save();

        $info = Information::query()
            ->where('personal_email', $personal_data['personal_email'])
            ->orWhere('personal_address', $personal_data['personal_email'])
            ->firstOrCreate($personal_data);

        $info->orders()->attach($order);
        $info->save();

        return $order;
    }

}