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
            $table->string('status_notes')->nullable()->comment('未通過原因')->after('notes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('activity_reservations', function (Blueprint $table) {
            // 執行 rollback 時移除該欄位
            $table->dropColumn('status_notes');
        });
    }
};
