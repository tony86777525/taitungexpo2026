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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name_tw')->nullable()->comment('品牌名稱（中）');
            $table->string('name_en')->nullable()->comment('品牌名稱（英）');
            $table->string('url')->nullable()->comment('品牌連結');
            $table->text('description_tw')->nullable()->comment('品牌介紹（中）');
            $table->text('description_en')->nullable()->comment('品牌介紹（英）');
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
        Schema::dropIfExists('brands');
    }
};
