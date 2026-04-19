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
        Schema::table('activity_reservations', function (Blueprint $table) {
            $table->string('guide_leader_phone')->nullable()->comment('導覽領隊人聯絡電話')->after('guide_leader_contact');
            $table->string('guide_leader_email')->nullable()->comment('導覽領隊人聯絡信箱')->after('guide_leader_phone');
            $table->string('vip_staff_only_notes')->nullable()->comment('vip團隊內部備註')->after('guide_leader_phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('activity_reservations', function (Blueprint $table) {
            // 執行 rollback 時移除該欄位
            $table->dropColumn(['guide_leader_phone', 'guide_leader_email']);
        });
    }
};
