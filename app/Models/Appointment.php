<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $with = ['doctor', 'pet'];
    protected $fillable = [
        'petId',
        'doctorId',
        'date',
        'time',
        'status',
        // Add other fields as necessary
    ];
    public function pet()
    {
        return $this->hasOne(Pet::class, 'id', 'petId');
    }
    public function doctor()
    {
        return $this->hasOne(User::class, 'id', 'doctorId');
    }
    public static function findAvailableDoctor($date, $time)
    {
        $doctors = User::role('doctor')->get();
        //$doctors = User::where(Auth::User()->roles, 'doctor')->get();

        foreach ($doctors as $doctor) {
            $hasAppointment = self::where('doctorId', $doctor->id)
                ->where('date', $date)
                ->where('time', $time)
                ->exists();
            if (!$hasAppointment) {
                return $doctor->id;
            }
        }

        return null;
    }
}
