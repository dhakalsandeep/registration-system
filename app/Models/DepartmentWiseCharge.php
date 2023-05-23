<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentWiseCharge extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function patientType()
    {
        return $this->belongsTo(PatientType::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
