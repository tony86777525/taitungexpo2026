<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class PrivateSectorProjectImage extends Model
{
    protected $fillable = [
        'private_sector_project_id',
        'url',
        'alt_text',
        'sort_order'
    ];

    public function privateSectorProject(): BelongsTo
    {
        return $this->belongsTo(PrivateSectorProject::class);
    }
}
