<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProjectCategory extends Model
{
    protected $fillable = [
        // 計畫分類（中）
        'name_zh_TW',
        // 計畫分類（英）
        'name_en',
        // 啟用狀態
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the private sector project for the project category.
     * 民間參與計畫
     *
     * @return BelongsToMany
     */
    public function privateSectorProjects(): BelongsToMany
    {
        return $this->belongsToMany(PrivateSectorProject::class, 'psp_project_category');
    }
}
