<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    public function medicalRecord()
    {
       return $this->hasOne(MedicalRecord::class,'patientId','id');
    }

    protected $fillable = [
        'appointmentDate',
        'symptoms',
        'diagnosis',
        'reminder',
        'recheckDate',
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class, 'patientID', 'id' );
    }
}
