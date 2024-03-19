@extends('main')

@section('title', 'Crear orden')

@section('body')
    
<div class="container mx-auto px-3">
    <h1 class="mt-3 text-2xl font-bold"> Crea una orden de venta para {{ $event->name }} </h1>
    
    <div class="flex gap-4 text-red-500">
    @foreach ($errors->all() as $error)
        <h1> {{ $error }} </h1>
    @endforeach
    </div>

    @if ($total_tickets <= 0)
    <h1 class="mt-5"> No hay tickets disponibles </h1>
    @else

    <h1 class="text-2xl font-semibold my-4"> Para este solo quedan {{ $total_tickets }} disponible(s) </h1>

    <form action="{{ route('events.orders.store', $event->id) }}" method="post" enctype="multipart/form-data">
        @csrf

        <h1 class="text-xl font-semibold my-2 underline"> Datos generales </h1>

        <div class="flex flex-wrap mb-6">
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="grid-first-name">
                    Cantidad de tickets
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-1 px-3 mb-3 leading-tight focus:outline-none focus:bg-white" type="number" name="quantity_of_tickets" max="{{ $total_tickets }}" value="{{ old('quantity_of_tickets') }}">
                {{-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> --}}
            </div>

            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="grid-first-name">
                    Imagen del pago
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-1 px-3 mb-3 leading-tight focus:outline-none focus:bg-white" type="file" name="picture">
                {{-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> --}}
            </div>
        </div>

        <h1 class="text-xl font-semibold my-2 underline"> Datos personales </h1>

        <div class="flex flex-wrap mb-6 ">
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="grid-first-name">
                    Nombre completo del comprador
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-1 px-3 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" name="personal_fullname" value="{{ old('personal_fullname') }}">
                {{-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> --}}
            </div>

            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="grid-first-name">
                    Email del comprador
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-1 px-3 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" name="personal_email" value="{{ old('personal_email') }}">
                {{-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> --}}
            </div>

            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="grid-first-name">
                    Direccion del comprador
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-1 px-3 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" name="personal_address" value="{{ old('perosnal_address') }}">
                {{-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> --}}
            </div>
        </div>

        <button class="bg-gray-600 hover:bg-gray-700 text-white px-5 py-1.5 rounded-md" type="submit"> Crear orden </button>

    </form>
    @endif
</div>

@endsection