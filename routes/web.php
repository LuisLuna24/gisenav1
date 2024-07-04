<?php

use App\Http\Controllers\OrdenesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


//&==========================================================================Ordenes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/ordenes/create',[OrdenesController::class,'create'])->name('ordenes.create');

    Route::post('/ordenes',[OrdenesController::class,'store'])->name('ordenes.store');

    Route::get('/ordenes/{no_orden}/muestras',[OrdenesController::class,'new_muestra'])->name('ordenes.muestra');

    Route::get('/ordenes/{no_orden}/orden',[OrdenesController::class,'show'])->name('ordenes.show');

});
