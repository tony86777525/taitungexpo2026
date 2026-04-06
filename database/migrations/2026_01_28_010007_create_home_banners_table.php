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
        Schema::create('home_banners', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('media_type')->comment('類型 (1:圖片, 2:影片)');
            $table->string('media_url')->nullable()->comment('圖片/影片連結');
            $table->string('name_tw')->nullable()->comment('文字（中）');
            $table->string('name_en')->nullable()->comment('文字（英）');
            $table->string('link')->nullable()->comment('連結');
            $table->boolean('is_active')->default(true)->comment('啟用狀態');
            $table->tinyInteger('sort_order')->nullable()->comment('排序順序');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_banners');
    }
};
