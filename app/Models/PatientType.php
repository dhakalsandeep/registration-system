<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientType extends Model
{
    use HasFactory;

    public function departmentWiseCharge()
    {
        return $this->hasMany(DepartmentWiseCharge::class);
    }
}
