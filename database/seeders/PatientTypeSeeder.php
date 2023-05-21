<?php

namespace Database\Seeders;

use App\Models\PatientType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PatientType::truncate();
        $patientTypes = [
            [
                'code' => 'GEN',
                'name' => 'General'
            ],
            [
                'code' => 'EHS',
                'name' => 'Extended Health Service',
            ],
        ];

        PatientType::insert($patientTypes);
    }
}
