<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PrivateSectorProjectContentLink extends Model
{
    protected $fillable = [
        'private_sector_project_content_id',
        'name',
        'url',
    ];

    public function content(): BelongsTo
    {
        return $this->belongsTo(PrivateSectorProjectContent::class);
    }
}
