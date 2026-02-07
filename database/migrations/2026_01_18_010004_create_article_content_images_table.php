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
        Schema::create('article_content_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_content_id')->constrained('article_contents')->onDelete('cascade');
            $table->string('url')->nullable()->comment('圖片');
            $table->string('alt_text')->nullable()->comment('Alt文字');
            $table->tinyInteger('sort_order')->comment('排序順序');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_content_images');
    }
};
