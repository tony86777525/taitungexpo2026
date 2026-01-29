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
            $table->string('name')->comment('網址名稱');
            $table->string('url')->comment('網址連結');
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
