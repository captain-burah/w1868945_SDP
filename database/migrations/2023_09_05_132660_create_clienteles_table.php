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
        Schema::create('clienteles', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('unit_id')->nullable(true);

            $table->string('prefix')->nullable(true);
            $table->string('name')->nullable(true);
            $table->string('email')->nullable(true);
            $table->string('contact1')->nullable(true);
            $table->string('contact2')->nullable(true);
            $table->string('contact3')->nullable(true);
            $table->string('nationality')->nullable(true);
            $table->string('country_of_residence')->nullable(true);
            $table->string('passport')->nullable(true);
            $table->string('passport_expiry')->nullable(true);
            $table->string('address1')->nullable(true);
            $table->string('address2')->nullable(true);

            $table->string('ar_prefix')->nullable(true);
            $table->string('ar_name')->nullable(true);
            $table->string('ar_email')->nullable(true);
            $table->string('ar_contact1')->nullable(true);
            $table->string('ar_contact2')->nullable(true);
            $table->string('ar_contact3')->nullable(true);
            $table->string('ar_nationality')->nullable(true);
            $table->string('ar_country_of_residence')->nullable(true);
            $table->string('ar_passport')->nullable(true);
            $table->string('ar_passport_expiry')->nullable(true);
            $table->string('ar_address1')->nullable(true);
            $table->string('ar_address2')->nullable(true);

            $table->timestamps();
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clienteles');
    }
};
