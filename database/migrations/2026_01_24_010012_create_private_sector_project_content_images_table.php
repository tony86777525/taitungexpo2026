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
        Schema::create('private_sector_project_content_images', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('private_sector_project_content_id')
                ->constrained('private_sector_project_contents', 'id', 'psp_content_images_content_id_fk')
                ->onDelete('cascade');
            $table->string('url')->comment('圖片連結');
            $table->string('alt_text')->comment('替代文字');
            $table->tinyInteger('sort_order')->comment('排序順序');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('private_sector_project_content_images');
    }
};
