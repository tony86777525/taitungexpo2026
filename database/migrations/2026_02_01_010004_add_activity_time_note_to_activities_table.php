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
            $table->string('activity_time_note_tw')->nullable()->comment('開放時間備註（中）')->after('activity_end_time');
            $table->string('activity_time_note_en')->nullable()->comment('開放時間備註（英）')->after('activity_time_note_tw');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('activities', function (Blueprint $table) {
            // 執行 rollback 時移除該欄位
            $table->dropColumn('activity_time_note_tw, activity_time_note_en');
        });
    }
};
