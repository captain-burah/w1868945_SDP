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
        Schema::create('website_news', function (Blueprint $table) {
            $table->id();

            $table->string('status')->default('0');

            $table->unsignedBigInteger('created_by')->nullable(true);

            $table->string('slug_link')->nullable(true);

            $table->string('title')->nullable(true);
            $table->string('title_ar')->nullable(true);

            $table->string('description')->nullable(true);
            $table->string('description_ar')->nullable(true);

            $table->string('meta_title')->nullable(true);
            $table->string('meta_title_ar')->nullable(true);

            $table->string('meta_description')->nullable(true);
            $table->string('meta_description_ar')->nullable(true);

            $table->string('meta_keywords')->nullable(true);
            $table->string('meta_keywords_ar')->nullable(true);

            $table->string('longitude')->nullable(true);
            $table->string('latitude')->nullable(true);
    
            $table->string('header_image')->nullable(true);

            $table->string('map_image')->nullable(true);

            $table->string('thumbnail')->nullable(true);

            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_news');
    }
};
