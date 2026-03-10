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
        Schema::create('p_unit_type_unit', function (Blueprint $table) {
            $table->id();
            // 歸屬於哪一個專案類型
            $table->foreignId('project_unit_type_id')->constrained('project_unit_types')->onDelete('cascade');
            // 對應到哪一個具體的單位
            $table->foreignId('unit_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_unit_type_unit');
    }
};
