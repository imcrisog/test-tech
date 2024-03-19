<?php

namespace App\Repositories\Interfaces;

interface EventRepositoryInterface {
    public function all();

    public function find(int $id);

    public function store(array $data);
}