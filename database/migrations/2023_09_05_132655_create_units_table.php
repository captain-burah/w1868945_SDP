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
        Schema::create('units', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('project_id')->nullable(true);
            $table->unsignedBigInteger('status')->nullable(true); //operations (active/draft/trash)
            $table->unsignedBigInteger('state')->nullable(true); //unit state (sold/mortizing/booked)
            $table->unsignedBigInteger('created_by')->nullable(true);

            $table->string('slug_link')->nullable(true);
            $table->string('name')->nullable(true);
            
            $table->longText('description')->nullable(true);
            $table->string('building_name')->nullable(true);
            $table->integer('land_reg_fee')->nullable(true);
            $table->integer('oqood_amount')->nullable(true);
            $table->integer('dld_fees')->nullable(true);
            $table->string('bedroom')->nullable(true);
            $table->integer('bathroom')->nullable(true);
            $table->integer('floor')->nullable(true);
            $table->string('unit_price')->nullable(true);
            $table->string('unit_size_range')->nullable(true);
            $table->string('outdoor_area')->nullable(true);
            $table->string('terrace_area')->nullable(true);

            $table->unsignedBigInteger('unit_floorplan_id')->nullable(true);
            $table->unsignedBigInteger('unit_brochure_id')->nullable(true);

            $table->string('meta_title')->nullable(true);
            $table->string('meta_description')->nullable(true);
            $table->string('meta_keywords')->nullable(true);

            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            
            $table->foreign('unit_floorplan_id')->references('id')->on('unit_floorplans')->onDelete('set null');
            $table->foreign('unit_brochure_id')->references('id')->on('unit_brochures')->onDelete('set null');

            $table->foreign('state')->references('id')->on('unit_states')->onDelete('restrict');
            $table->foreign('status')->references('id')->on('unit_statuses')->onDelete('restrict');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
