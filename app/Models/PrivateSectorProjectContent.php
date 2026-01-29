<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PrivateSectorProjectContent extends Model
{
    protected $fillable = [
        'private_sector_project_id',
        'title',
        'content',
    ];

    /**
     * Get the images for the article content.
     */
    public function images(): HasMany
    {
        return $this->hasMany(PrivateSectorProjectContentImage::class);
    }

    /**
     * Get the links for the article content.
     */
    public function links(): HasMany
    {
        return $this->hasMany(PrivateSectorProjectContentLink::class);
    }
}
