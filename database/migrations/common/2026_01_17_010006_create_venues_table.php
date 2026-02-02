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
        Schema::create('venues', function (Blueprint $table) {
            $table->id();
            // 展區分類：舊站特區 / 美術館區 / 寶町區 / 臨海區 / 就藝會區 / 衛星展區 / 民間展區 / 限定活動
            $table->foreignId('zone_id')->constrained('zones');
            // EX: 台東博覽會主場館 / 台東特有種 / ...
            $table->string('name')->comment('場館名稱');
            // EX: A1 / A2 / A3 /...
            $table->string('code')->unique()->comment('場館代碼');
            $table->string('location')->comment('地點位置詳情');
            $table->boolean('is_active')->default(true)->comment('啟用狀態');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venues');
    }
};
