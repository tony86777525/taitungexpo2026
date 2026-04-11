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
            $table->string('guide_leader_name')->nullable()->comment('導覽領隊人')->after('activity_session_id');
            $table->string('guide_leader_contact')->nullable()->comment('導覽領隊人聯絡方式')->after('guide_leader_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('activity_reservations', function (Blueprint $table) {
            // 執行 rollback 時移除該欄位
            $table->dropColumn(['guide_leader_name', 'guide_leader_contact']);
        });
    }
};
