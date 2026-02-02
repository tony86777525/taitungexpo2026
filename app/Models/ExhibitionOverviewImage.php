<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExhibitionOverviewImage extends Model
{
    protected $fillable = [
        'exhibition_overview_id',
        // 圖片
        'url',
        // Alt 文字
        'alt_text',
        // 排序順序
        'sort_order'
    ];

    /**
     * Get the exhibition overview for the exhibition overview image.
     * 最新消息
     *
     * @return BelongsTo
     */
    public function privateSectorProject(): BelongsTo
    {
        return $this->belongsTo(PrivateSectorProject::class);
    }
}
