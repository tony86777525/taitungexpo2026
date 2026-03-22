<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ActivityReservationController;
use Illuminate\Support\Facades\Route;


Route::group([
    'as' => 'user.',
    'middleware' => ['set.web.language'],
], function () {
    Route::get('/', function () {
        return view('user.index');
    })->name('index');

    // 主題介紹
    Route::get('/about/themes', function () {
        return view('user.about.themes');
    });
    // 策展論述
    Route::get('/about/statement', function () {
        return view('user.about.statement');
    });
    // 形象識別系統
    Route::get('/about/vi', function () {
        return view('user.about.vi');
    });

    // 展會概覽（第二批）
    // Route::get('/about/themes', function () {
    //     return view('user.about.themes');
    // });

    // 最新消息
    // 列表
    Route::get('/news/list', function () {
        return view('user.news.list');
    })->name('news.list');
    //子分頁
    Route::get('/news/detail/{id?}/', function () {
        return view('user.news.detail');
    })->name('news.detail');

    // 活動行事曆
    Route::get('/event/list', function () {
        return view('user.event.list');
    });
    Route::get('/event/detail', function () {
        return view('user.event.detail');
    });

    // 交通資訊（第二批）
    // Route::get('/traffic', function () {
    //     return view('user.traffic');
    // });

    // 民間參與計畫
    // 列表
    Route::get('/participation/list', function () {
        return view('user.participation.list');
    });
    //子分頁（第二批）
    // Route::get('/participation/detail', function () {
    //     return view('user.participation.detail');
    // });

    // 品牌授權專區
    // 列表
    Route::get('/authorization/list', function () {
        return view('user.authorization.list');
    });
    //子分頁（第二批）
    // Route::get('/authorization/detail', function () {
    //     return view('user.authorization.detail');
    // });

    // 東博STYLE（第二批）
    // Route::get('/style', function () {
    //     return view('user.style');
    // });
});

Route::get('/activity', [ActivityController::class, 'index'])->name('activity.index');
Route::get('/activity/{sessionId}/reservation', [ActivityReservationController::class, 'create'])->name('activity.reservation.form');
Route::post('/activity/reservation', [ActivityReservationController::class, 'store'])->name('activity.reservation.store');
