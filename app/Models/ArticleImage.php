<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArticleImage extends Model
{
    protected $fillable = [
        'article_id',
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
    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
