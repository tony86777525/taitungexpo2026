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
        Schema::create('exhibition_overview_featured_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exhibition_overview_id');
            $table->foreign('exhibition_overview_id', 'eo_fi_eo_id_foreign')
                ->references('id')
                ->on('exhibition_overviews')
                ->onDelete('cascade');
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
        Schema::dropIfExists('exhibition_overview_featured_images');
    }
};
