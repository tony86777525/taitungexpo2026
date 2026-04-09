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
        // 強制這個 Model 只能看到一般場次資料
        static::addGlobalScope('vip', function (Builder $builder) {
            $builder->where('type', ActivitySessionType::VIP->value);
        });
    }
}
