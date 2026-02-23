<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ActivityReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/activity', [ActivityController::class, 'index'])->name('activity.index');
Route::get('/activity/{sessionId}/reservation', [ActivityReservationController::class, 'create'])->name('activity.reservation.form');
Route::post('/activity/reservation', [ActivityReservationController::class, 'store'])->name('activity.reservation.store');
