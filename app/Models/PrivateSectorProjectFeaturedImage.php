<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PrivateSectorProjectFeaturedImage extends Model
{
    protected $fillable = [
        'private_sector_project_id',
        // 圖片
        'url',
        // Alt 文字
        'alt_text',
        // 排序順序
        'sort_order'
    ];

    /**
     * Get the private sector project for the private sector project image.
     * 最新消息
     *
     * @return BelongsTo
     */
    public function privateSectorProject(): BelongsTo
    {
        return $this->belongsTo(PrivateSectorProject::class);
    }
}
