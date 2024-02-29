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
        Schema::table('brokers', function (Blueprint $table) {
            $table->string('company_po_box')->nullable(true);
            $table->string('company_adddress')->nullable(true);
            $table->string('company_email')->nullable(true);
            $table->string('company_land_line')->nullable(true);
            $table->string('company_website')->nullable(true);
            $table->string('bank_swift_code')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('brokers', function (Blueprint $table) {
            //
        });
    }
};
