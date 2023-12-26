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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('unit_id')->nullable(true);

            $table->string('payment_status')->nullable(true);   // online or cheque or bank deposit
            $table->string('payment_price')->nullable(true);
            $table->string('description')->nullable(true);
            $table->string('is_reservation_agreement_emailed')->nullable(true);
            $table->string('is_first_installment_notified')->nullable(true);
            $table->string('is_first_installment_paid')->nullable(true);
            $table->string('first_installment_date')->nullable(true);
            $table->timestamps();

            $table->foreign('unit_id')->references('id')->on('units')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
