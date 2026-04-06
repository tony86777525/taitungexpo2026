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
        Schema::table('project_unit_types', function (Blueprint $table) {
            $table->string('name_tw')->nullable()->comment('單位類型（中）')->after('name');
            $table->string('name_en')->nullable()->comment('單位類型（英）')->after('name_tw');
            $table->dropColumn('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_unit_types', function (Blueprint $table) {
            // 執行 rollback 時移除該欄位
            $table->string('name')->comment('單位類型')->after('id');
            $table->dropColumn(['name_tw', 'name_en']);
        });
    }
};
