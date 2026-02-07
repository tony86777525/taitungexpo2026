<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// 策展性質
class CurationNature extends Model
{
    protected $fillable = [
        'name_tw',
        'name_en',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
