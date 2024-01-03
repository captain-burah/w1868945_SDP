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
        Schema::create('broker_agents', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(true);
            $table->string('rera_number')->nullable(true);
            $table->unsignedBigInteger('broker_id')->nullable(true);
            $table->string('contact1')->nullable(true);
            $table->string('contact2')->nullable(true);
            $table->string('email')->nullable(true);
            $table->foreign('broker_id')->references('id')->on('brokers')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('broker_agents');
    }
};
