<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Event;
use App\Services\Queries\EventService;
use App\Services\Queries\OrderService;
use \Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class OrdersController extends Controller 
{
    public function __construct(
        private EventService $events_service, 
        private OrderService $order_service
    ) {}

    public function create(int $id): View | RedirectResponse
    {
        $event = $this->events_service->show($id);

        if (!isset($event)) {
            return view('errors.404');
        }

        $total_tickets = $this->order_service->get_tickets($event, $event->orders);

        return view('orders.create', compact('event', 'total_tickets'));
    }

    public function store(StoreOrderRequest $request, int $id)
    {
        $event = Event::find($id);

        if (!$this->order_service->attempt($event, $event->orders, $request->quantity_of_tickets)) {
            $total = $this->order_service->get_tickets($event, $event->orders);

            return back()->withErrors([
                'quantity' => 'Cantidad de tickets no valida, debe ser menor ' . $total
            ]);
        }       

        $data = $request->safe()->only('quantity_of_tickets');
        $personal_data = $request->safe()->only(['personal_address', 'personal_email', 'personal_fullname']);

        $this->order_service->create(
            $data, 
            $request->file('picture'), 
            $personal_data,
            $id
        );

        return redirect()->route('events.index');   
    }
}