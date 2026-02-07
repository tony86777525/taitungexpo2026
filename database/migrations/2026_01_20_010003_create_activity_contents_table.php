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
        Schema::create('activity_contents', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('activity_id')
                ->constrained('activities', 'id', 'activity_contents_project_id_fk')
                ->onDelete('cascade');
            $table->text('title_tw')->nullable()->comment('標題（中）');
            $table->text('title_en')->nullable()->comment('標題（英）');
            $table->text('item_text_en')->nullable()->comment('項目文字（中）');
            $table->text('item_text_tw')->nullable()->comment('項目文字（英）');
            $table->text('content_tw')->nullable()->comment('內文（中）');
            $table->text('content_en')->nullable()->comment('內文（英）');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_contents');
    }
};
