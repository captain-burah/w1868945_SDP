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
        Schema::create('booking_payment_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_id')->nullable(true);
            $table->string('name');
            $table->date('date');
            $table->unsignedBigInteger('percentage');
            $table->unsignedBigInteger('amount');
            $table->timestamps();
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_payment_plans');
    }
};
