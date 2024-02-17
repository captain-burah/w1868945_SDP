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
        Schema::create('website_gallery_media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gallery_id')->nullable(true);
            $table->string('name')->nullable(true);
            $table->string('type')->nullable(true);
            $table->timestamps();
            $table->foreign('gallery_id')->references('id')->on('website_galleries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_gallery_media');
    }
};
