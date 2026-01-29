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
        Schema::dropIfExists('private_sector_project_content_links');
    }
};
