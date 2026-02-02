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
        Schema::create('curation_natures', function (Blueprint $table) {
            $table->id();
            $table->string('name_zh_TW')->nullable()->comment('策展議題（中）');
            $table->string('name_en')->nullable()->comment('策展議題（英）');
            $table->boolean('is_active')->default(true)->comment('啟用狀態');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curation_natures');
    }
};
