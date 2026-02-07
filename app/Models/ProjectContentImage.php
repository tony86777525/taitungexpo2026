<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectContentImage extends Model
{
    protected $fillable = [
        'project_content_id',
        // 圖片
        'url',
        // Alt 文字
        'alt_text',
        // 排序順序
        'sort_order'
    ];

    /**
     * Get the content for the project content image.
     * 內文
     *
     * @return BelongsTo
     */
    public function content(): BelongsTo
    {
        return $this->belongsTo(ProjectContent::class);
    }
}
