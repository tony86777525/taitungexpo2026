<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityImage extends Model
{
    protected $fillable = [
        'activity_id',
        // 圖片
        'url',
        // Alt 文字
        'alt_text',
        // 排序順序
        'sort_order'
    ];

    /**
     * Get the activity for the activity image.
     * 活動
     *
     * @return BelongsTo
     */
    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class);
    }
}
