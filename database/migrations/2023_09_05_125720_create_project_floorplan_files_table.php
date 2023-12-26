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
        Schema::create('project_floorplan_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_floorplan_id')->nullable(true);
            $table->string('name');
            $table->timestamps();
            $table->foreign('project_floorplan_id')->references('id')->on('project_floorplans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_floorplan_files');
    }
};
