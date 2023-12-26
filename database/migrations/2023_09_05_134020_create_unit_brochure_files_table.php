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
        Schema::create('unit_brochure_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit_brochure_id')->nullable(true);
            $table->string('name');
            $table->timestamps();
            $table->foreign('unit_brochure_id')->references('id')->on('unit_brochures')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_brochure_files');
    }
};
