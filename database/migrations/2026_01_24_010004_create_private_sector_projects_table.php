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
        Schema::create('private_sector_projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_name_zh_TW');
            $table->string('project_name_en');
            $table->date('project_date')->nullable();
            $table->string('project_location_zh_TW')->nullable();
            $table->string('project_location_en')->nullable();
            $table->string('map_link')->nullable();
            $table->string('featured_image_url')->nullable();
            $table->string('thumbnail_url')->nullable();
            $table->foreignId('executing_unit_id')->nullable()->constrained('units')->nullOnDelete();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('private_sector_projects');
    }
};
