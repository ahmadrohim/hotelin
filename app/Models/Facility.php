<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $table = 'facilities';
    protected $guarded = ['id'];


    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'room_facility');
    }
    
}
