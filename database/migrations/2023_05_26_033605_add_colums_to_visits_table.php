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
        Schema::table('visits', function (Blueprint $table) {
            $table->unsignedBigInteger('patient_type_id');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('hospital_no');

            $table->date('visit_date');
            $table->time('visit_time');

            $table->foreign('hospital_no')->references('hospital_no')->on('patients');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('patient_type_id')->references('id')->on('patient_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('visits', function (Blueprint $table) {
            //
        });
    }
};
