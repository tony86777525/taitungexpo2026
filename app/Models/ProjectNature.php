<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProjectNature extends Model
{
    protected $fillable = [
        // 計畫性質（中）
        'name_tw',
        // 計畫性質（英）
        'name_en',
        // 啟用狀態
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the project for the project nature.
     * 民間參與計畫
     *
     * @return BelongsToMany
     */
    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'p_project_nature');
    }
}
