<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Room extends Model
{
    use HasFactory;
    protected $table = 'rooms';

    protected $fillable = [
        'hotel_id',
        'type',
        'slug',
        'price',
        'facilities',
        'availability_status',
        'image',
    ];

    protected static function booted()
    {
        static::creating(function ($room) {
            $room->slug = Str::slug($room->type);
        });

        static::updating(function ($room) {
            $room->slug = Str::slug($room->type);
        });
    }
}
