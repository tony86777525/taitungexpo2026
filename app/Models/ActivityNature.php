<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ActivityNature extends Model
{
    protected $fillable = [
        // 活動性質（中）
        'name_zh_TW',
        // 活動性質（英）
        'name_en',
        // 啟用狀態
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the activity for the activity nature.
     * 活動
     *
     * @return BelongsToMany
     */
    public function Activities(): BelongsToMany
    {
        return $this->belongsToMany(Activity::class, 'activity_activity_nature');
    }
}
