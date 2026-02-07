<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectFeaturedImage extends Model
{
    protected $fillable = [
        'project_id',
        // 圖片
        'url',
        // Alt 文字
        'alt_text',
        // 排序順序
        'sort_order'
    ];

    /**
     * Get the project for the project image.
     * 最新消息
     *
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
