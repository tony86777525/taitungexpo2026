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
            $table->string('contact_name')->nullable()->comment('單位/聯絡人')->after('tour_venue_note');
            $table->string('contact_phone')->nullable()->comment('聯絡電話')->after('contact_name');
            $table->string('contact_email')->nullable()->comment('聯絡信箱')->after('contact_phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('activity_sessions', function (Blueprint $table) {
            // 執行 rollback 時移除該欄位
            $table->dropColumn(['contact_email', 'contact_phone', 'contact_name']);
        });
    }
};
