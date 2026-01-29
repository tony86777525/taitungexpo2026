<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// 單位
class Unit extends Model
{
    protected $fillable = [
        // 單位文字（中）
        'name_zh_TW',
        // 單位文字（英）
        'name_en',
        // 單位圖檔
        'image_url',
        // 單位連結
        'link',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
