<?php

namespace App\Services\Queries;

use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Repositories\Local\OrderRepository as OrderRepositoryLocal;

class OrderService
{
    public function __construct(
        private OrderRepositoryInterface $order_repository,
        private OrderRepositoryLocal $order_repository_local
    ) {}

    public function show(int $id) 
    {
        return $this->order_repository->find($id);
    }

    public function create(array $data, mixed $picture, array $personal_data, int $id)
    {
        $data['picture'] = $this->order_repository_local->save_picture($picture);

        return $this->order_repository->store($data, $personal_data, $id);
    }

    public function attempt($event, $orders, $quantity)
    {
        return $this->order_repository_local->attempt_create($event, $orders, $quantity);
    }

    public function get_tickets($event, $orders)
    {
        return $this->order_repository_local->get_tickets($event, $orders);
    }
}