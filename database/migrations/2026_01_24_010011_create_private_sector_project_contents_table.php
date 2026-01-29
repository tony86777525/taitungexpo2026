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
        Schema::create('private_sector_project_contents', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('private_sector_project_id')
                ->constrained('private_sector_projects', 'id', 'psp_contents_project_id_fk')
                ->onDelete('cascade');
            $table->text('title')->comment('標題');
            $table->text('content')->comment('內容');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('private_sector_project_contents');
    }
};
