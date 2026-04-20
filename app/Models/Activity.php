<?php

namespace App\Models;

use App\Enums\Language;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class Activity extends Model
{
    protected $fillable = [
        'project_id',
        // 活動標題（中）
        'title_tw',
        // 活動標題（英）
        'title_en',
        // 活動日期
        'activity_start_date',
        'activity_end_date',
        // 活動開始時間
        'activity_start_time',
        // 活動結束時間
        'activity_end_time',
        // 開放時間備註（中）
        'activity_time_note_tw',
        // 開放時間備註（英）
        'activity_time_note_en',
        // 活動地點（中）
        'activity_location_tw',
        // 活動地點（英）
        'activity_location_en',
        // 地圖連結
        'map_link',
        // 報名資訊
        'participation_type_id',
        // 報名資訊連結
        'participation_link',
        // 縮略圖
        'thumbnail_url',
        // 活動卡片導向連結
        'url',
        // 顯示導覽預約資訊
        'show_tour_info',
        // 啟用狀態
        'is_active',
        // 排序順序
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'show_tour_info' => 'boolean',
    ];

    /**
     * Get the project for the activity.
     * 計畫
     *
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the activity natures for the activity.
     * 活動性質
     *
     * @return BelongsToMany
     */
    public function activityNatures(): BelongsToMany
    {
        return $this->belongsToMany(ActivityNature::class, 'activity_activity_nature');
    }

    /**
     * Get the project types for the activity.
     * 計畫類型
     *
     * @return BelongsToMany
     */
    public function projectTypes(): BelongsToMany
    {
        return $this->belongsToMany(ProjectType::class, 'activity_project_type');
    }

    /**
     * Get the participation type for the activity.
     * 報名資訊
     *
     * @return BelongsTo
     */
    public function participationType(): BelongsTo
    {
        return $this->belongsTo(ParticipationType::class, 'participation_type_id');
    }

    /**
     * Get the images for the activity.
     * 活動相簿
     *
     * @return HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(ActivityImage::class);
    }

    /**
     * Get the contents for the activity.
     * 活動內容
     *
     * @return HasMany
     */
    public function contents(): HasMany
    {
        return $this->hasMany(ActivityContent::class);
    }

    /**
     * 活動期間-日期
     *
     * @return string
     */
    public function getDisplayDateRangeAttribute(): string
    {
        $startDate = Carbon::create($this->activity_start_date)->translatedFormat('n/j D');
        $endDate = Carbon::create($this->activity_end_date)->translatedFormat('n/j D');

        return "{$startDate} ~ {$endDate}";
    }

    /**
     * 活動期間-日期
     *
     * @return string
     */
    public function getDisplayDateRangeDetailAttribute(): string
    {
        $startDate = Carbon::create($this->activity_start_date)->translatedFormat('Y.n.j（D）');
        $endDate = Carbon::create($this->activity_end_date)->translatedFormat('Y.n.j（D）');

        return "{$startDate}－{$endDate}";
    }

    /**
     * 活動期間-每日開放時間
     *
     * @return string
     */
    public function getDisplayTimeRangeAttribute(): string
    {
        $startTime = Carbon::create($this->activity_start_time)->translatedFormat('H:i');
        $endTime = Carbon::create($this->activity_end_time)->translatedFormat('H:i');

        return "{$startTime}-{$endTime}";
    }

    /**
     * @return string|null
     */
    public function getDisplayActivityTimeNoteAttribute(): ?string
    {
        if (app()->getLocale() === Language::EN->value && !empty($this->activity_time_note_en)) {
            return $this->activity_time_note_en;
        }

        return $this->activity_time_note_tw;
    }

    /**
     * @return string
     */
    public function getDisplayTimeRangeAndNoteAttribute(): string
    {
        if (!empty($this->display_activity_time_note)) {
            return "{$this->display_time_range}（{$this->display_activity_time_note}）";
        }

        return $this->display_time_range;
    }

    /**
     * @return string|null
     */
    public function getDisplayTitleAttribute(): ?string
    {
        if (app()->getLocale() === Language::EN->value && !empty($this->title_en)) {
            return $this->title_en;
        }

        return $this->title_tw;
    }

    /**
     * @return string|null
     */
    public function getDisplayActivityLocationAttribute(): ?string
    {
        if (app()->getLocale() === Language::EN->value && !empty($this->activity_location_en)) {
            return $this->activity_location_en;
        }

        return $this->activity_location_tw;
    }

    /**
     * @return string|null
     */
    public function getDisplayProjectNameAttribute(): ?string
    {
        if ($this->relationLoaded('project') === false) {
            return null;
        }

        return $this->project->display_project_name;
    }

    /**
     * @return string|null
     */
    public function getDisplayParticipationTypeNameAttribute(): ?string
    {
        if ($this->relationLoaded('participationType') === false) {
            return null;
        }

        return $this->participationType->display_name;
    }

    /**
     * @return string|null
     */
    public function getDisplayParticipationTypeLinkNameAttribute(): ?string
    {
        if ($this->relationLoaded('participationType') === false) {
            return null;
        }

        return $this->participationType->display_link_name;
    }

    /**
     * @return string
     */
    public function getDisplayThumbnailAttribute(): string
    {
        return asset('storage/' . $this->thumbnail_url);
    }

    /**
     * @return string
     */
    public function getDisplayUrlAttribute(): string
    {
        if (!empty($this->url)) {
            return $this->url;
        }

        return lang_route('user.event.detail', ['id' => $this->id]);
    }

    /**
     * @return Collection|null
     */
    public function getProjectNatures(): ?Collection
    {
        if ($this->relationLoaded('project') === false) {
            return null;
        }

        $project = $this->project;

        if ($project->relationLoaded('projectNatures') === false) {
            return null;
        }

        return $project->projectNatures;
    }

    /**
     * @return Collection|null
     */
    public function getProjectTypes(): ?Collection
    {
        if ($this->relationLoaded('projectTypes') === false) {
            return null;
        }

        return $this->projectTypes;
    }

    /**
     * @return Collection|null
     */
    public function getNatures(): ?Collection
    {
        if ($this->relationLoaded('activityNatures') === false) {
            return null;
        }

        return $this->activityNatures;
    }

    /**
     * @return Collection|null
     */
    public function getContents(): Collection|null
    {
        if ($this->relationLoaded('contents') === false) {
            return null;
        }

        if ($this->contents->isEmpty()) {
            return null;
        }

        return $this->contents;
    }

    /**
     * @return Collection|null
     */
    public function getImages(): Collection|null
    {
        if ($this->relationLoaded('images') === false) {
            return null;
        }

        if ($this->images->isEmpty()) {
            return null;
        }

        return $this->images;
    }

    /**
     * @return boolean
     */
    public function canDisplayParticipationInfo(): bool
    {
        if (empty($this->participation_type_id)) {
            return false;
        }

        if ($this->relationLoaded('participationType') === false) {
            return false;
        }

        $participationType = $this->participationType;

        if (empty($participationType)) {
            return false;
        }

        return true;
    }

    /**
     * @return boolean
     */
    public function canDisplayParticipationInfoLink(): bool
    {
        if (empty($this->participation_link)) {
            return false;
        }

        if ($this->relationLoaded('participationType') === false) {
            return false;
        }

        $participationType = $this->participationType;

        if (empty($participationType)) {
            return false;
        }

        if (empty($participationType->display_link_name)) {
            return false;
        }

        return true;
    }
}
