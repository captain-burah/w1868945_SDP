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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(true);

            $table->string('name');
            $table->string('slug_link');
            $table->string('image');
            $table->longText('description');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('meta_keywords');

            $table->string('name_ar');
            $table->string('slug_link_ar');
            $table->longText('description_ar');
            $table->string('meta_title_ar');
            $table->string('meta_description_ar');
            $table->string('meta_keywords_ar');

            $table->string('status');
            $table->string('views');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
