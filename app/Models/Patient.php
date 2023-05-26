<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $casts = [
        'other' => 'json'
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }
}
