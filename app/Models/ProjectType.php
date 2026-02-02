<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProjectType extends Model
{
    protected $fillable = [
        // 計畫類型（中）
        'name_zh_TW',
        // 計畫類型（英）
        'name_en',
        // 啟用狀態
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the activity for the project type.
     * 活動
     *
     * @return BelongsToMany
     */
    public function activities(): BelongsToMany
    {
        return $this->belongsToMany(Activity::class, 'activity_project_type');
    }
}
