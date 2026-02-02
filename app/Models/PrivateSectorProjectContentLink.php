<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PrivateSectorProjectContentLink extends Model
{
    protected $fillable = [
        'private_sector_project_content_id',
        // 連結按鈕（中）
        'name_zh_TW',
        // 連結按鈕（英）
        'name_en',
        // 連結（中）
        'url_zh_TW',
        // 連結（英）
        'url_en',
    ];

    /**
     * Get the content for the private sector project content link.
     * 內文
     *
     * @return BelongsTo
     */
    public function content(): BelongsTo
    {
        return $this->belongsTo(PrivateSectorProjectContent::class);
    }
}
