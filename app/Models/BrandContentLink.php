<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BrandContentLink extends Model
{
    protected $fillable = [
        'brand_content_id',
        // 連結按鈕（中）
        'name_tw',
        // 連結按鈕（英）
        'name_en',
        // 連結（中）
        'url_tw',
        // 連結（英）
        'url_en',
    ];

    /**
     * Get the content for the brand content link.
     * 內文
     *
     * @return BelongsTo
     */
    public function content(): BelongsTo
    {
        return $this->belongsTo(BrandContent::class);
    }
}
