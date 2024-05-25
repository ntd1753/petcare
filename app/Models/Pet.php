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
    protected $fillable = [
        'name',
        'age',
        'color',
        'gender',
        'avatar',
        'HealthStatus',
    ];

    public function patients()
    {
        return $this->hasMany(Patient::class, 'petId', 'id')->orderBy('appointmentDate', 'desc');
    }

}
