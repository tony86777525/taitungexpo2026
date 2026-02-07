<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $fillable = [
        // 展區代碼
        'code',
        // 展區（中）
        'name_tw',
        // 展區（英）
        'name_en',
        // 啟用狀態
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
