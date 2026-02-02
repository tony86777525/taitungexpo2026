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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title_zh_TW')->nullable()->comment('消息標題（中）');
            $table->string('title_en')->nullable()->comment('消息標題（英）');
            $table->date('published_at')->nullable()->comment('日期');
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
        Schema::dropIfExists('articles');
    }
};
