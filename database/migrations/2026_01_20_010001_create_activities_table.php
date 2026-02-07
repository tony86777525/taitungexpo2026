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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->nullable()->constrained('projects')->nullOnDelete();
            $table->string('title_tw')->comment('活動標題（中）');
            $table->string('title_en')->comment('活動標題（英）');
            $table->text('activity_start_date')->nullable()->comment('活動開始日期');
            $table->text('activity_end_date')->nullable()->comment('活動結束日期');
            $table->text('activity_start_time')->nullable()->comment('活動開始時間');
            $table->text('activity_end_time')->nullable()->comment('活動結束時間');
            $table->string('activity_location_tw')->nullable()->comment('活動地點（中）');
            $table->string('activity_location_en')->nullable()->comment('活動地點（英）');
            $table->string('map_link')->nullable()->comment('地圖連結');
            $table->text('registration_info_tw')->nullable()->comment('報名資訊（中）');
            $table->text('registration_info_en')->nullable()->comment('報名資訊（英）');
            $table->text('tour_info_tw')->nullable()->comment('導覽預約資訊（中）');
            $table->text('tour_info_en')->nullable()->comment('導覽預約資訊（英）');
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
        Schema::dropIfExists('activities');
    }
};
