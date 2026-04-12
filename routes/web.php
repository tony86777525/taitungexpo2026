<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ActivityReservationController;
use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\User\NewsController;
use App\Http\Controllers\User\EventController;
use App\Http\Controllers\User\ParticipationController;
use App\Http\Controllers\User\BrandController;
use Illuminate\Support\Facades\Route;

Route::group([
    'as' => 'user.',
    'middleware' => ['set.web.language'],
], function () {
    Route::group([
        'as' => 'frontend.',
        'prefix' => 'frontend',
    ], function () {
        Route::get('/', function () {
            return view('user.frontend.index');
        })->name('index');

        // 主題介紹
        Route::get('/about/themes', function () {
            return view('user.frontend.about.themes');
        })->name('about.themes');
        // 策展論述
        Route::get('/about/statement', function () {
            return view('user.frontend.about.statement');
        })->name('about.statement');
        // 形象識別系統
        Route::get('/about/vi', function () {
            return view('user.frontend.about.vi');
        })->name('about.vi');

        // 展會概覽
        // 列表
        Route::get('/about/overview/', function () {
            return view('user.frontend.about.overview.list');
        })->name('about.overview.list');
        // 子分頁
        Route::get('/about/overview/detail', function () {
            return view('user.frontend.about.overview.detail');
        })->name('about.overview.detail');

        // 最新消息
        // 列表
        Route::get('/news/list', function () {
            return view('user.frontend.news.list');
        })->name('news.list');
        //子分頁
        Route::get('/news/detail/', function () {
            return view('user.frontend.news.detail');
        })->name('news.detail');

        // 活動行事曆
        Route::get('/event/list', function () {
            return view('user.frontend.event.list');
        })->name('event.list');
        Route::get('/event/detail', function () {
            return view('user.frontend.event.detail');
        })->name('event.detail');

        // 交通資訊（第二批）
        Route::get('/traffic', function () {
            return view('user.frontend.traffic');
        })->name('traffic');

        // 民間參與計畫
        // 列表
        Route::get('/participation/list', function () {
            return view('user.frontend.participation.list');
        })->name('participation.list');
        //子分頁（第二批）
        Route::get('/participation/detail', function () {
            return view('user.frontend.participation.detail');
        })->name('participation.detail');

        // 品牌授權專區
        // 列表
        Route::get('/brand/list', function () {
            return view('user.frontend.brand.list');
        })->name('brand.list');
        //子分頁（第二批）
        Route::get('/brand/detail', function () {
            return view('user.frontend.brand.detail');
        })->name('brand.detail');

        // 東博STYLE（第二批）
        // Route::get('/style', function () {
        //     return view('user.frontend.style');
        // });

        // 預約表單（第二批）
        // 表單填寫
        Route::get('/reservation/form', function () {
            return view('user.frontend.reservation/form');
        })->name('reservation.form');
        // 表單完成
        Route::get('/reservation/complete', function () {
            return view('user.frontend.reservation/complete');
        })->name('reservation.complete');
    });

    Route::get('/', [IndexController::class, 'index'])
        ->name('index');

    // 最新消息
    Route::get('/news/list', [NewsController::class, 'index'])
        ->name('news.list');
    Route::get('/news/detail/{id}/', [NewsController::class, 'detail'])
        ->name('news.detail')
        ->whereNumber('id');

    // 活動行事曆
    Route::get('/event/list', [EventController::class, 'index'])
        ->name('event.list');
    Route::get('/event/detail/{id}/', [EventController::class, 'detail'])
        ->name('event.detail')
        ->whereNumber('id');

    // 民間參與計畫
    Route::get('/participation/list', [ParticipationController::class, 'index'])
        ->name('participation.list');
    Route::get('/participation/detail/{id}/', [ParticipationController::class, 'detail'])
        ->name('participation.detail')
        ->whereNumber('id');

    // 品牌授權專區
    Route::get('/brand/list', [BrandController::class, 'index'])
        ->name('brand.list');
    Route::get('/brand/detail/{id}/', [BrandController::class, 'detail'])
        ->name('brand.detail')
        ->whereNumber('id');

    // 展會概覽（第二批）
    Route::get('/about/overview', function () {
        return view('user.frontend.about.overview');
    })->name('about.overview');
    // 主題介紹
    Route::get('/about/themes', function () {
        return view('user.about.themes');
    })->name('about.themes');
    // 策展論述
    Route::get('/about/statement', function () {
        return view('user.about.statement');
    })->name('about.statement');
    // 形象識別系統
    Route::get('/about/vi', function () {
        return view('user.about.vi');
    })->name('about.vi');
});

Route::get('/activity', [ActivityController::class, 'index'])->name('activity.index');
Route::get('/activity/{sessionId}/reservation', [ActivityReservationController::class, 'create'])->name('activity.reservation.form');
Route::post('/activity/reservation', [ActivityReservationController::class, 'store'])->name('activity.reservation.store');
