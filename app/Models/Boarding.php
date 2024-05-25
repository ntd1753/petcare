<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boarding extends Model
{


    public function room()
    {
        return $this->belongsTo(Room::class);
    }

}
