<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ActivityReservationController;
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

        // 展會概覽（第二批）
        Route::get('/about/overview', function () {
            return view('user.frontend.about.overview');
        })->name('about.overview');

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
        // Route::get('/traffic', function () {
        //     return view('user.frontend.traffic');
        // });

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
    });

    Route::get('/', [IndexController::class, 'index'])
        ->name('index');

    Route::get('/news/list', function () {
        return view('user.news.list');
    })->name('news.list');

    Route::get('/news/detail/{id}/', function () {
        return view('user.news.detail');
    })->name('news.detail');

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
    // 最新消息
    // 列表
    Route::get('/news/list', function () {
        return view('user.frontend.news.list');
    })->name('news.list');
});

Route::get('/activity', [ActivityController::class, 'index'])->name('activity.index');
Route::get('/activity/{sessionId}/reservation', [ActivityReservationController::class, 'create'])->name('activity.reservation.form');
Route::post('/activity/reservation', [ActivityReservationController::class, 'store'])->name('activity.reservation.store');
