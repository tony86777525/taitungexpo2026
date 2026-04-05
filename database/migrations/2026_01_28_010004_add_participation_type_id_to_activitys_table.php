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
            $table->foreignId('participation_type_id')->nullable()->after('map_link')->constrained('participation_types')->nullOnDelete();
            $table->text('participation_link')->nullable()->comment('報名連結')->after('participation_type_id');
            $table->dropColumn(['registration_info_tw', 'registration_info_en']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('activities', function (Blueprint $table) {
            // 執行 rollback 時移除該欄位
            $table->dropColumn(['participation_type_id', 'participation_link']);
            $table->text('registration_info_tw')->nullable()->comment('報名資訊（中）')->after('map_link');
            $table->text('registration_info_en')->nullable()->comment('報名資訊（英）')->after('registration_info_tw');
        });
    }
};
