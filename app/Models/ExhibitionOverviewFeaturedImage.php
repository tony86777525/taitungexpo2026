<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExhibitionOverviewFeaturedImage extends Model
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
     * 展覽概覽
     *
     * @return BelongsTo
     */
    public function exhibitionOverview(): BelongsTo
    {
        return $this->belongsTo(ExhibitionOverview::class);
    }
}
