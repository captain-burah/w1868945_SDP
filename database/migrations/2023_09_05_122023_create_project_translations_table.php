<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('project_translations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('language_id')->nullable(true);
            $table->unsignedBigInteger('project_id')->nullable(true);

            $table->string('status')->default('0');

            $table->string('slug_link')->nullable(true);
            $table->string('name')->nullable(true);
            $table->longText('description')->nullable(true);
            $table->string('ownership')->nullable(true);

            $table->string('meta_title')->nullable(true);
            $table->string('meta_description')->nullable(true);
            $table->string('meta_keywords')->nullable(true);

            $table->timestamps();

            $table->foreign('language_id')->references('id')->on('languages')->onDelete('restrict');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_translations');
    }
};
