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
        Schema::create('article_content_links', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('article_content_id')
                ->constrained('article_contents')
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
        Schema::dropIfExists('article_content_links');
    }
};
