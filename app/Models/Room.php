<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RoomCategory;

class Room extends Model
{
    use HasFactory;
    protected $table = 'rooms';
    protected $guarded = ['id'];


    public function category()
    {
        return $this->belongsTo(RoomCategory::class, 'category_id');
    }

}
