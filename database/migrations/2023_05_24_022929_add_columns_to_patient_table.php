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
        Schema::table('patients', function (Blueprint $table) {
            $table->string('title')->after('id');
            $table->string('first_name')->after('title');
            $table->string('last_name');
            $table->date('dob');
            $table->enum('gender', ['MALE', 'FEMALE', 'OTHER']);
            $table->json('other');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patient', function (Blueprint $table) {
            //
        });
    }
};
