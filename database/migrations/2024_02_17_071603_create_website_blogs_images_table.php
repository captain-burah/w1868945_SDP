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
        Schema::create('website_blogs_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blogs_id')->nullable(true);
            $table->string('name')->nullable(true);
            $table->timestamps();
            $table->foreign('blogs_id')->references('id')->on('website_blogs')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_blogs_images');
    }
};
