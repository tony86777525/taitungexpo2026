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
            $table->unsignedTinyInteger('status')->default(2)->comment('狀態 (1:confirmed, 0:cancelled, 2:pending)');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_reservations');
    }
};
