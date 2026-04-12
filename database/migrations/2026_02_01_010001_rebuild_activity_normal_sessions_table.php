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
        Schema::dropIfExists('activity_reservations');

        Schema::dropIfExists('activity_sessions');

        Schema::create('activity_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
            $table->tinyInteger('type')->comment('場次類型 (1:普通, 2:vip)');
            $table->date('date')->comment('預約日期');
            $table->time('start_time')->comment('預約開始時段');
            $table->time('end_time')->comment('預約結束時段');
            $table->integer('quota_min')->nullable()->default(0)->comment('建議人數下限');
            $table->integer('quota_max')->nullable()->default(0)->comment('建議人數上限');
            $table->integer('group_max')->nullable()->default(0)->comment('預約組數上限');
            $table->text('tour_venue_note')->nullable()->comment('團體導覽場館備註');
            $table->string('contact_name')->nullable()->comment('單位/聯絡人');
            $table->string('contact_phone')->nullable()->comment('聯絡電話');
            $table->string('contact_email')->nullable()->comment('聯絡信箱');
            $table->boolean('is_active')->default(true)->comment('啟用狀態');
            $table->tinyInteger('sort_order')->nullable()->comment('排序順序');
            $table->timestamps();
        });

        Schema::create('activity_reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_session_id')->constrained('activity_sessions')->onDelete('cascade');
            $table->string('contact_name')->nullable()->comment('聯絡人姓名');
            $table->string('contact_phone')->nullable()->comment('聯絡電話');
            $table->string('contact_email')->nullable()->comment('電子郵件');
            $table->string('contact_group_name')->nullable()->comment('預約團體名稱');
            $table->unsignedInteger('participants_quota')->default(1)->comment('預計參與人數');
            $table->text('notes')->nullable()->comment('備註（選填）');
            $table->string('status_notes')->nullable()->comment('未通過原因');
            $table->unsignedTinyInteger('status')->default(2)->comment('狀態 (1:confirmed, 0:cancelled, 2:pending)');
            $table->tinyInteger('sort_order')->nullable()->comment('排序順序');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_reservations');

        Schema::dropIfExists('activity_sessions');

        Schema::create('activity_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
            $table->date('date')->comment('預約日期');
            $table->time('start_time')->comment('預約開始時段');
            $table->time('end_time')->comment('預約結束時段');
            $table->integer('quota_min')->nullable()->default(0)->comment('建議人數下限');
            $table->integer('quota_max')->nullable()->default(0)->comment('建議人數上限');
            $table->integer('group_max')->nullable()->default(0)->comment('預約組數上限');
            $table->integer('group_vip')->nullable()->default(0)->comment('預約組數上限（vip）');
            $table->tinyInteger('group_regular')->nullable()->default(0)->comment('預約組數上限（一般）');
            $table->text('tour_venue_note')->nullable()->comment('團體導覽場館備註');
            $table->string('contact_name')->nullable()->comment('單位/聯絡人');
            $table->string('contact_phone')->nullable()->comment('聯絡電話');
            $table->string('contact_email')->nullable()->comment('聯絡信箱');
            $table->boolean('is_active')->default(true)->comment('啟用狀態');
            $table->tinyInteger('sort_order')->nullable()->comment('排序順序');
            $table->timestamps();
        });

        Schema::create('activity_reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_session_id')->constrained('activity_sessions')->onDelete('cascade');
            $table->tinyInteger('type')->comment('預約類型 (1:普通, 2:vip)');
            $table->string('contact_name')->nullable()->comment('聯絡人姓名');
            $table->string('contact_phone')->nullable()->comment('聯絡電話');
            $table->string('contact_email')->nullable()->comment('電子郵件');
            $table->string('contact_group_name')->nullable()->comment('預約團體名稱');
            $table->unsignedInteger('participants_quota')->default(1)->comment('預計參與人數');
            $table->text('notes')->nullable()->comment('備註（選填）');
            $table->string('status_notes')->nullable()->comment('未通過原因');
            $table->unsignedTinyInteger('status')->default(2)->comment('狀態 (1:confirmed, 0:cancelled, 2:pending)');
            $table->tinyInteger('sort_order')->nullable()->comment('排序順序');
            $table->timestamps();
        });
    }
};
