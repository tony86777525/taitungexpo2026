<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('exhibition_overviews', function (Blueprint $table) {
            $table->id();
            $table->string('logo_url')->nullable()->comment('LOGO');
            $table->foreignId('venue_id')->nullable()->constrained('venues')->nullOnDelete();
            $table->string('project_name_zh_TW')->nullable()->comment('計畫名稱（中）');
            $table->string('project_name_en')->nullable()->comment('計畫名稱（英）');
            $table->date('project_start_date')->nullable()->comment('執行開始日期');
            $table->date('project_end_date')->nullable()->comment('執行結束日期');
            $table->time('project_start_time')->nullable()->comment('執行開始時間');
            $table->time('project_end_time')->nullable()->comment('執行結束時間');
            $table->string('project_location_zh_TW')->nullable()->comment('計畫地點（中）');
            $table->string('project_location_en')->nullable()->comment('計畫地點（英）');
            $table->string('map_link')->nullable()->comment('地圖連結');
            $table->string('featured_image_url')->nullable()->comment('主視覺');
            $table->string('thumbnail_url')->nullable()->comment('縮略圖');
            $table->boolean('is_active')->default(true)->comment('啟用狀態');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exhibition_overviews');
    }
};
