<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EventController;


Route::group([
    'as' => 'api.',
    'middleware' => ['set.web.language'],
], function () {
    Route::post('/get/event/list', [EventController::class, 'getEventList'])
        ->name('get.event.list');
});

