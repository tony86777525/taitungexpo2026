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
            $table->boolean('show_tour_info')->default(false)->comment('顯示導覽預約資訊')->after('participation_link');
            $table->dropColumn(['tour_info_tw', 'tour_info_en']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('activities', function (Blueprint $table) {
            // 執行 rollback 時移除該欄位
            $table->dropColumn('show_tour_info');
            $table->text('tour_info_tw')->nullable()->comment('導覽預約資訊（中）')->after('participation_link');
            $table->text('tour_info_en')->nullable()->comment('導覽預約資訊（英）')->after('tour_info_tw');
        });
    }
};
