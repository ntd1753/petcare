<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    public static function DB(string $string)
    {
    }

    public function owners(){
        return $this->hasOne(User::class,'id','ownerId');
    }
    public function species(){
        return $this->hasOne(Species::class,'id','speciesId');
    }
    public function patients(){

        return $this->hasMany(Patient::class,'petId','id');
    }
    public function boardings()
    {
        return $this->hasMany(Boarding::class);
    }
    public function pet()
    {
        return $this->belongsTo(Pet::class, 'petId');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'roomId');
    }
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'petId');
    }
}
