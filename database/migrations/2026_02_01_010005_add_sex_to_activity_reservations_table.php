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
            $table->string('contact_sex')->nullable()->comment('聯絡人性別')->after('contact_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('activity_reservations', function (Blueprint $table) {
            // 執行 rollback 時移除該欄位
            $table->dropColumn('contact_sex');
        });
    }
};
