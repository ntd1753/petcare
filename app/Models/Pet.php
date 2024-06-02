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

    public function owners(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'ownerId');
    }
    public function species(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Species::class, 'id', 'speciesId');
    }
    public function patients(): \Illuminate\Database\Eloquent\Relations\HasMany
    {

        return $this->hasMany(Patient::class, 'petId', 'id');
    }
    public function boardings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Boarding::class,'petId');
    }
    public function pet(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Pet::class, 'petId');
    }

    public function room(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Room::class, 'roomId');
    }
    public function appointments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Appointment::class, 'petId');
    }

    public function services()
    {
        return $this->hasMany(PetService::class);
    }
}
