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
        Schema::create('booking_clients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->nullable(true);
            $table->unsignedBigInteger('booking_id')->nullable(true);
            $table->foreign('client_id')->references('id')->on('clienteles')->onDelete('restrict');
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_clients');
    }
};
