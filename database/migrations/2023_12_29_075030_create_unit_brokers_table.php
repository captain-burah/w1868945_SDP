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
        Schema::create('unit_brokers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit_id')->nullable(true);
            $table->unsignedBigInteger('broker_id')->nullable(true);
            $table->timestamps();
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('restrict');
            $table->foreign('broker_id')->references('id')->on('brokers')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_brokers');
    }
};
