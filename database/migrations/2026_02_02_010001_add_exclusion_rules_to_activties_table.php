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
        Schema::table('activities', function (Blueprint $table) {
            $table->json('exclusion_rules')->default(null)->comment('排除規則（日期、星期）')->after('activity_end_date');
        });

        DB::table('activities')
            ->update([
                'exclusion_rules' => json_encode([
                    'exclusion_days' => [],
                    'exclusion_dates' => []
                ])
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('activities', function (Blueprint $table) {
            // 執行 rollback 時移除該欄位
            $table->dropColumn('exclusion_rules');
        });
    }
};
