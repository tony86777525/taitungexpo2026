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
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('project_time_note');
            $table->string('project_time_note_tw')->nullable()->comment('開放時間備註（中）')->after('project_end_time');
            $table->string('project_time_note_en')->nullable()->comment('開放時間備註（英）')->after('project_time_note_tw');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // 執行 rollback 時移除該欄位
            $table->dropColumn('project_time_note_tw, project_time_note_en');
            $table->string('project_time_note')->nullable()->comment('開放時間備註')->after('project_end_time');
        });
    }
};
