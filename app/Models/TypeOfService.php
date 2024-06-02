<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfService extends Model
{
    use HasFactory;
    public function petServices(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PetService::class);
    }
}
