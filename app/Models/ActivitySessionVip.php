<?php

namespace App\Models;

use App\Enums\ActivitySessionType;
use Illuminate\Database\Eloquent\Builder;

class ActivitySessionVip extends ActivitySession
{
    /**
     * @return void
     */
    protected static function booted(): void
    {
        // 強制這個 Model 只能看到vip場次資料
        static::addGlobalScope('vip', function (Builder $builder) {
            $builder->where('activity_sessions.type', ActivitySessionType::VIP->value);
        });
    }
}
