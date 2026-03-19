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
        Schema::table('activity_sessions', function (Blueprint $table) {
            $table->tinyInteger('group_regular')->nullable()->default(0)->comment('預約組數上限（一般）')->after('group_vip');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('activity_sessions', function (Blueprint $table) {
            // 執行 rollback 時移除該欄位
            $table->dropColumn('group_regular');
        });
    }
};
