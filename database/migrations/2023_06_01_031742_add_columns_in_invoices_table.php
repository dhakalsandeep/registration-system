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
        Schema::table('invoices', function (Blueprint $table) {
            $table->unsignedBigInteger('visit_id');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('hospital_no');
            $table->string('prefix');
            $table->string('invoice_no')->unique();
            $table->float('amount');

            $table->foreign('visit_id')->references('id')->on('visits');
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('hospital_no')->references('hospital_no')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            //
        });
    }
};
