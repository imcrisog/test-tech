@extends('main')

@section('title', 'Crear evento')

@section('body')

<div class="container mx-auto px-3">
<h1 class="my-4 font-bold text-xl"> Crea tu evento </h1>
    
<div class="flex gap-4 text-red-500">
    @foreach ($errors->all() as $error)
        <h1> {{ $error }} </h1>
    @endforeach
</div>

<form action="{{ route('events.store') }}" method="post">
    @csrf

    <div class="flex flex-wrap mb-6">
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="grid-first-name">
                Nombre del evento
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-1 px-3 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" name="name" value="{{ old('name') }}">
            {{-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> --}}
        </div>

        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="grid-first-name">
                Descripcion
            </label>
            <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-1 px-3 mb-3 leading-tight focus:outline-none focus:bg-white" name="description">{{ old('description') }}</textarea>
            {{-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> --}}
        </div>
    </div>

    <div class="flex flex-wrap mb-6">
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="grid-first-name">
                Cantidad total de tickets
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-1 px-3 mb-3 leading-tight focus:outline-none focus:bg-white" type="number" name="total_tickets" value="{{ old('total_tickets') }}">
            {{-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> --}}
        </div>

        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="grid-first-name">
                Fecha del evento
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-1 px-3 mb-3 leading-tight focus:outline-none focus:bg-white" type="date" name="date">
            {{-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> --}}
        </div>
    </div>

    <button class="bg-gray-600 hover:bg-gray-700 text-white px-5 py-1.5 rounded-md" type="submit"> Crear evento </button>

</form>
</div>

@endsection