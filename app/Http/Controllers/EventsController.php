<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Services\Queries\EventService;
use \Illuminate\Contracts\View\View;

class EventsController extends Controller 
{
    public function __construct(
        private EventService $events_service
    ) {}
    
    public function index(): View
    {
        [$events, $orders] = $this->events_service->all();

        return view('events.index', compact('events', 'orders'));
    }    

    public function show(int $id): View
    {   
        $event = $this->events_service->show($id);

        if (!$event) {
            return view("errors.404");
        }

        return view('events.show', compact('event'));
    }

    public function create(): View
    {
        return view('events.create');
    }

    public function store(StoreEventRequest $request)
    {
        $data = $request->safe()->only(['name', 'description', 'date', 'total_tickets']);
        $this->events_service->create($data);

        return redirect()->route('events.index');
    }
}