<?php

namespace App\Models;

use App\Enums\ActivityReservationType;
use Illuminate\Database\Eloquent\Builder;

class ActivityReservationVip extends ActivityReservation
{
    /**
     * @return void
     */
    protected static function booted(): void
    {
        // 強制這個 Model 只能看到vip場次資料
        static::addGlobalScope('vip', function (Builder $builder) {
            $builder->whereHas('activitySession', function ($query) {
                $query->where('type', ActivityReservationType::VIP->value);
            });
        });
    }
}
