<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// 計畫性質
class ProjectNature extends Model
{
    protected $fillable = [
        'name_zh_TW',
        'name_en',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
