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
        Schema::create('landingpageseos', function (Blueprint $table) {
            $table->id();
            $table->string('page')->nullable(true);
            $table->string('title_en')->nullable(true);
            $table->string('title_ar')->nullable(true);
            $table->string('keywords_en')->nullable(true);
            $table->string('keywords_ar')->nullable(true);
            $table->string('description_en')->nullable(true);
            $table->string('description_ar')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landingpageseos');
    }
};
