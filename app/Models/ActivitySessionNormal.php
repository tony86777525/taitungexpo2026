<?php

namespace App\Models;

use App\Enums\ActivitySessionType;
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
}
