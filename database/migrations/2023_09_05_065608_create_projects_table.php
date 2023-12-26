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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default('0');

            $table->unsignedBigInteger('type_id')->nullable(true);
            $table->unsignedBigInteger('created_by')->nullable(true);
            $table->unsignedBigInteger('category_id')->nullable(true);
            $table->unsignedBigInteger('location_id')->nullable(true);
            $table->unsignedBigInteger('emirate_id')->nullable(true);
            $table->unsignedBigInteger('property_release_id')->nullable(true);

            $table->string('slug_link')->nullable(true);
            $table->string('name')->nullable(true);
            $table->string('description')->nullable(true);

            $table->longText('secOne_title')->nullable(true);
            $table->longText('secTwo_title')->nullable(true);
            $table->longText('secThree_title')->nullable(true);

            $table->longText('SecOne_description')->nullable(true);
            $table->longText('SecTwo_description')->nullable(true);
            $table->longText('SecTwo_amenities')->nullable(true);
            $table->longText('SecThree_description')->nullable(true);

            $table->string('community')->nullable(true);
            $table->string('ownership')->nullable(true);
            $table->string('handover')->nullable(true);
            $table->string('starting_price')->nullable(true);

            $table->string('meta_title')->nullable(true);
            $table->string('meta_description')->nullable(true);
            $table->string('meta_keywords')->nullable(true);

            $table->string('latitude')->nullable(true);
            $table->string('longitude')->nullable(true);

            $table->integer('no_of_units')->nullable(true);
            $table->string('bedrooms')->nullable(true);
            $table->string('bathrooms')->nullable(true);
            $table->string('floors')->nullable(true);
            $table->string('unit_size_range')->nullable(true);
            $table->string('outdoor_area')->nullable(true);
            $table->string('terrace_area')->nullable(true);
            $table->string('escrow')->nullable(true);

            $table->timestamps();

            $table->foreign('emirate_id')->references('id')->on('emirates')->onDelete('restrict');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('restrict');
            $table->foreign('category_id')->references('id')->on('project_types')->onDelete('restrict');
            $table->foreign('type_id')->references('id')->on('project_types')->onDelete('restrict');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
