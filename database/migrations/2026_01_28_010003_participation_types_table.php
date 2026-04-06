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
        Schema::create('participation_types', function (Blueprint $table) {
            $table->id();
            $table->string('name_tw')->nullable()->comment('報名資訊（中）');
            $table->string('name_en')->nullable()->comment('報名資訊（英）');
            $table->string('link_name_tw')->nullable()->comment('報名連結文字（中）');
            $table->string('link_name_en')->nullable()->comment('報名連結文字（英）');
            $table->boolean('is_active')->default(true)->comment('啟用狀態');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participation_types');
    }
};
