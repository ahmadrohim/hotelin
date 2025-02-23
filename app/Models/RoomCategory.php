<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RoomCategory extends Model
{
    use HasFactory;
    protected $table = 'room_categories';
    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($RoomCategory){
            $RoomCategory->slug = Str::slug($RoomCategory->name, '-');
        });

        static::updating(function ($RoomCategory){
            $RoomCategory->slug = Str::slug($RoomCategory->name, '-');
        });
    }
}
