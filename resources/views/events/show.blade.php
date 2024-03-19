@extends('main')

@section('title', 'Ver')

@section('body')
    
<div class="w-full container mx-auto">
    <h1> Evento: {{ $event->name }} </h1>
    <h1> Descripcion: {{ $event->description }} </h1>
    <h1> Fecha: {{ $event->date }} </h1>

    <div class="flex flex-wrap gap-5">
    @foreach ($event->orders as $order)
    
        <div class="w-[25rem] my-10">
            <h1> Tickets: {{ $order->quantity_of_tickets }} </h1>
            <h1> Nombre: {{ $order->informations[0]->personal_fullname }} </h1>
            <h1> Correo: {{ $order->informations[0]->personal_email }} </h1>
    
            <img src="{{ route('files.index', ['part' => explode('/', $order->picture)[0], 'filename' => explode('/', $order->picture)[1]]) }}">
        </div>
    
    @endforeach
    </div>
</div>

@endsection