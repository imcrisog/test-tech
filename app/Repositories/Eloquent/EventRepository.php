<?php

namespace App\Repositories\Eloquent;

use App\Models\Event;
use App\Models\Order;
use App\Repositories\Interfaces\EventRepositoryInterface;

class EventRepository implements EventRepositoryInterface
{
    public function all()
    {
        return [Event::with('orders')->get(), Order::with('informations')->get()];
    }

    public function find(int $id)
    {
        try {
            return Event::query()->findOrFail($id);
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function store(array $data)
    {
        return Event::query()->create($data);
    }

}