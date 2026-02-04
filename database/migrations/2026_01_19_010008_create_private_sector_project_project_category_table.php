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
        Schema::create('psp_project_category', function (Blueprint $table) {
            $table->id();
            $table->foreignId('private_sector_project_id')->constrained('private_sector_projects')->onDelete('cascade');
            $table->foreignId('project_category_id')->constrained('project_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psp_project_category');
    }
};
