<?php

namespace App\Services\Queries;

use App\Repositories\Interfaces\EventRepositoryInterface;

class EventService 
{
    public function __construct(
        protected EventRepositoryInterface $event_repository
    ) {}

    public function all()
    {
        return $this->event_repository->all();
    }

    public function show(int $id)
    {
        return $this->event_repository->find($id);
    }

    public function create(array $data)
    {
        return $this->event_repository->store($data);
    }
}