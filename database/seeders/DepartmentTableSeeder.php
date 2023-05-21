<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [
                'code' => 'ORT01',
                'name' => 'ORTHOPAEDIC',
            ],
            [
                'code' => 'MED01',
                'name' => 'MEDICINE',
            ],
        ];

        Department::insert($departments);
    }
}
