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
        Schema::create('zones', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->comment('展區代碼');
            // 展區分類：舊站特區 / 美術館區 / 寶町區 / 臨海區 / 就藝會區 / 衛星展區 / 民間展區 / 限定活動
            $table->string('name_tw')->nullable()->comment('展區（中）');
            $table->string('name_en')->nullable()->comment('展區（英）');
            $table->boolean('is_active')->default(true)->comment('啟用狀態');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zones');
    }
};
