@extends('main')

@section('title', 'Ver')

@section('body')
    
<div class="w-full container mx-auto">
    <h1 class="text-xl font-semibold mt-5"> Evento: {{ $event->name }} </h1>
    <h1 class="text-xl font-semibold"> Descripcion: {{ $event->description }} </h1>
    <h1 class="text-xl font-semibold"> Fecha: {{ $event->date }} </h1>

    <div class="flex flex-wrap gap-5">
    @foreach ($event->orders as $order)
    
        <div class="w-[25rem] bg-gray-900 rounded-md p-5 my-10">
            <h1> Tickets: {{ $order->quantity_of_tickets }} </h1>
            <h1> Nombre: {{ $order->informations[0]->personal_fullname }} </h1>
            <h1 class="font-bold"> Correo: {{ $order->informations[0]->personal_email }} </h1>
            <h1 class="mb-2"> Direccion: {{ $order->informations[0]->personal_address }} </h1>
    
            <a href="{{ route('files.index', ['part' => explode('/', $order->picture)[0], 'filename' => explode('/', $order->picture)[1]]) }}">
                <img src="{{ route('files.index', ['part' => explode('/', $order->picture)[0], 'filename' => explode('/', $order->picture)[1]]) }}">
            </a>
        </div>
    
    @endforeach
    </div>
</div>

@endsection