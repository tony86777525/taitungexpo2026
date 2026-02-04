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
        Schema::create('activity_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_id')->constrained('activities')->onDelete('cascade');
            $table->date('date')->comment('預約日期');
            $table->time('start_time')->comment('預約開始時段');
            $table->time('end_time')->comment('預約結束時段');
            $table->integer('quota_min')->nullable()->default(0)->comment('建議人數下限');
            $table->integer('quota_max')->nullable()->default(0)->comment('建議人數上限');
            $table->integer('group_max')->nullable()->default(0)->comment('預約組數上限');
            $table->integer('group_vip')->nullable()->default(0)->comment('預約組數上限（vip）');
            $table->boolean('is_active')->default(true)->comment('啟用狀態');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_sessions');
    }
};
