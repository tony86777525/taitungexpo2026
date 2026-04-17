<?php

namespace App\Models;

use App\Enums\ActivitySessionType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class ActivitySessionNormal extends ActivitySession
{
    /**
     * @return void
     */
    protected static function booted(): void
    {
        // 強制這個 Model 只能看到一般場次資料
        static::addGlobalScope('normal', function (Builder $builder) {
            $builder->where('activity_sessions.type', ActivitySessionType::NORMAL->value);
        });
    }

    /**
     * 一般場次可預約的效期
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeForFrontendCanBeBook(Builder $query): Builder
    {
        $startLimit = Carbon::now()->addDays(7);
        $endLimit = Carbon::now()->addDays(14);

        return $query->whereBetween('date', [$startLimit, $endLimit]);
    }
}
