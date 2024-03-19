<?php

use App\Http\Controllers\EventsController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\OrdersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group([
    'middleware' => ['auth', 'admin.verified']
], function() {
    Route::resource('events', EventsController::class)
        ->only(['index', 'store', 'create', 'show']);

    Route::resource('events.orders', OrdersController::class)
        ->only(['store', 'create'])->shallow();
});

Route::get('files/{part}/{filename}', FilesController::class)->name('files.index');