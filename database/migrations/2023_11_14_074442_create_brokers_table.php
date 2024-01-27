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
        Schema::create('brokers', function (Blueprint $table) {
            $table->id();
            $table->string('status')->nullable(true);
            $table->string('company_type')->nullable(true);
            $table->string('company_name')->nullable(true);
            $table->string('state')->nullable(true);
            $table->string('trade_license')->nullable(true);
            $table->date('trade_license_expiry')->nullable(true);
            $table->string('rera_certificate')->nullable(true);
            $table->date('rera_certificate_expiry')->nullable(true);

            $table->string('authorized_p_name')->nullable(true);
            $table->string('authorized_p_country')->nullable(true);
            $table->string('authorized_p_passport')->nullable(true);
            $table->string('authorized_p_position')->nullable(true);
            $table->string('authorized_p_email')->nullable(true);
            $table->string('authorized_p_contact')->nullable(true);
            $table->string('authorized_p_address')->nullable(true);
            $table->string('authorized_p_city')->nullable(true);

            $table->string('power_of_atty_or_moa_id')->nullable(true);
            $table->string('valid_trade_license_id')->nullable(true);

            $table->string('rera_certificate_id')->nullable(true);
            $table->string('broker_card_id')->nullable(true);

            $table->string('valid_vat_certificate_or_noc_id')->nullable(true);
            $table->string('passport_visa_eid_id')->nullable(true);

            $table->string('bank_name')->nullable(true);
            $table->string('bank_country')->nullable(true);
            $table->string('bank_city')->nullable(true);
            $table->string('account_no')->nullable(true);
            $table->string('iban')->nullable(true);
            $table->string('account_title')->nullable(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brokers');
    }
};
