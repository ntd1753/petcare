<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    use HasFactory;

    public function medicalRecord()
    {
        return $this->belongsTo(MedicalRecord::class, 'medicalRecordId', 'id');
    }
}
