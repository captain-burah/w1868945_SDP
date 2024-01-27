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
        Schema::create('booking_reservation_forms', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('unit_id')->nullable(true);
            $table->unsignedBigInteger('project_id')->nullable(true);
            $table->unsignedBigInteger('booking_id')->nullable(true);

            $table->string('project_name')->nullable(true);
            $table->string('project_name_ar')->nullable(true);

            $table->string('property_type')->nullable(true);
            $table->string('property_type_ar')->nullable(true);

            $table->string('unit_name')->nullable(true);
            $table->string('unit_name_ar')->nullable(true);

            $table->string('building_name')->nullable(true);
            $table->string('building_name_ar')->nullable(true);

            $table->string('total_area')->nullable(true);
            $table->string('total_area_ar')->nullable(true);

            $table->string('bedrooms')->nullable(true);
            $table->string('bedrooms_ar')->nullable(true);

            $table->string('purchase_price')->nullable(true);
            $table->string('purchase_price_ar')->nullable(true);

            $table->string('vat')->nullable(true);
            $table->string('vat_ar')->nullable(true);

            $table->string('purchase_price_with_vat')->nullable(true);
            $table->string('purchase_price_with_vat_ar')->nullable(true);

            $table->string('deposit')->nullable(true);
            $table->string('deposit_ar')->nullable(true);

            $table->string('client_name')->nullable(true);
            $table->string('client_name_ar')->nullable(true);

            $table->string('client_license')->nullable(true);
            $table->string('client_license_ar')->nullable(true);

            $table->string('client_country')->nullable(true);
            $table->string('client_country_ar')->nullable(true);

            $table->string('client_nationality')->nullable(true);
            $table->string('client_nationality_ar')->nullable(true);

            $table->string('client_passport')->nullable(true);
            $table->string('client_passport_ar')->nullable(true);

            $table->string('client_addresss')->nullable(true);
            $table->string('client_addresss_ar')->nullable(true);

            $table->string('client_contact1')->nullable(true);
            $table->string('client_contact1_ar')->nullable(true);

            $table->string('client_contact2')->nullable(true);
            $table->string('client_contact2_ar')->nullable(true);

            $table->string('client_email')->nullable(true);
            $table->string('client_email_ar')->nullable(true);

            $table->timestamps();

            $table->foreign('unit_id')->references('id')->on('units')->onDelete('restrict');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('restrict');
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_reservation_forms');
    }
};
