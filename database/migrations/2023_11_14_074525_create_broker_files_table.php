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
        Schema::create('broker_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('broker_id')->nullable(true);
            $table->string('name')->nullable(true);
            $table->longText('filename')->nullable(true);
            $table->timestamps();
            $table->foreign('broker_id')->references('id')->on('brokers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('broker_files');
    }
};
