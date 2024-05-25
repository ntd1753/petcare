<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';
    use HasFactory;
    protected $fillable = ['RoomNumber', 'Capacity', 'status'];

    public function boardings()
    {
        return $this->hasMany(Boarding::class);
    }
}
