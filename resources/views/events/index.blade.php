@extends('main')

@section('title', 'Inicio')

@section('body')

@if (count($events) < 0)
<h1 class="my-4 font-bold text-2xl"> No hay eventos </h1>
@endif


<div x-data="{ open: false, ofevent: {{ $events[0]->id }}, events: {{ $events }}, orders: {{ $orders }}, baseUrl: '{{ route('events.show', 0) }}', thisBaseUrl: '{{ route('events.orders.create', 0) }}' }" class="my-5 overflow-x-auto shadow-md sm:rounded-lg mx-auto container">
    <div x-data="{ selectede: '{{ $events[0]->name }} - {{ $events[0]->id }}' }" class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 p-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
        <div>
            <button x-on:click="open = !open" data-dropdown-toggle="dropdownAction" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                <span class="sr-only">Action button</span>
                <span x-text="selectede"> </span>
                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div x-show="open" @click.outside="open = false" class="z-50 absolute bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <template x-for="(value, index) in events" class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                    <button x-data @click="ofevent = value.id, selectede = value.name + ' - ' + value.id, open = false" x-text="value.name" class="w-full p-4"></button>
                </template>
            </div>
        </div>
        <div class="relative flex gap-4">
            <a class="px-3 py-1.5 hover:bg-gray-800 rounded-md bg-gray-700 text-gray-200" href="{{ route('events.create') }}"> Crear evento </a>

            <a class="px-3 py-1.5 hover:bg-gray-800 rounded-md bg-gray-700 text-gray-200" x-bind:href="thisBaseUrl.replace('0', ofevent);"> Crear orden para este evento </a>
        </div>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre del comprador
                </th>
                <th scope="col" class="px-6 py-3">
                    Cantidad de tickets
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Ver
                </th>
            </tr>
        </thead>
        <tbody>
            <template x-for="(value, index) in {{ $orders }}">
                <template x-if="value.event_id == ofevent" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <tr>
                    <td class="px-6 py-4" x-text="value.id"></td>
                    <td class="px-6 py-4" x-text="value.informations[0].personal_fullname"></td>
                    <td class="px-6 py-4" x-text="value.quantity_of_tickets"></td>
                    <td class="px-6 py-4" x-text="value.confirmation ? 'Confirmado' : 'No confirmado'"></td>
                    <td class="px-6 py-4">
                        <a x-bind:href="baseUrl.replace('0', value.event_id);" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detalles</a>
                    </td>
                </tr>
                </template>
            </template>
        </tbody>
    </table>
</div>


@endsection