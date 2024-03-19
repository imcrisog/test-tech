<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('login', function() {
    $user = User::factory()->create();
    Auth::login($user);

    return redirect()->route('events.index');
})->name('login');

Route::view('unauthorized', 'errors.401', [], 401)->name('unauthorized');