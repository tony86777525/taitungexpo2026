<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PrivateSectorProjectContentImage extends Model
{
    protected $fillable = [
        'private_sector_project_content_id',
        'url',
        'alt_text',
        'sort_order'
    ];

    public function content(): BelongsTo
    {
        return $this->belongsTo(PrivateSectorProjectContent::class);
    }
}
