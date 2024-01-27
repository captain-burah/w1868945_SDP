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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_ru');
            $table->string('title_ar');
            $table->string('map_embed_code');
            $table->string('location');
            $table->string('address_en');
            $table->string('address_ru');
            $table->string('address_ar');
            $table->string('description_en');
            $table->string('description_ru');
            $table->string('description_ar');
            $table->string('facilities');
            $table->string('schools');
            $table->string('stores');
            $table->string('destinations');
            $table->string('meta_title_en');
            $table->string('meta_title_ru');
            $table->string('meta_title_ar');
            $table->string('meta_description_en');
            $table->string('meta_description_ru');
            $table->string('meta_description_ar');
            $table->string('meta_keywords_en');
            $table->string('meta_keywords_ru');
            $table->string('meta_keywords_ar');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
