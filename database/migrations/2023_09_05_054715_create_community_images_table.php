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
        Schema::create('community_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('community_id')->nullable(true);
            $table->string('name')->nullable(true);
            $table->timestamps();
            $table->foreign('community_id')->references('id')->on('communities')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('community_images');
    }
};
