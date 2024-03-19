<?php

namespace App\Repositories\Interfaces;

interface OrderRepositoryInterface
{
    public function find(int $id);

    public function store(array $data, array $personal_data, int $id);
}