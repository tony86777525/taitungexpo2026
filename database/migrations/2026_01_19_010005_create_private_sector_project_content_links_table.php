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
        Schema::create('private_sector_project_content_links', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('private_sector_project_content_id')
                ->constrained('private_sector_project_contents', 'id', 'psp_content_links_content_id_fk')
                ->onDelete('cascade');
            $table->string('name_zh_TW')->nullable()->comment('連結按鈕（中）');
            $table->string('name_en')->nullable()->comment('連結按鈕（英）');
            $table->string('url_zh_TW')->nullable()->comment('連結（中）');
            $table->string('url_en')->nullable()->comment('連結（英）');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('private_sector_project_content_links');
    }
};
