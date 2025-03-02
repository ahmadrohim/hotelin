<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class HotelFaicilities extends Model
{
    use HasFactory;
    protected $table = 'hotel_facilities';
    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function($HotelFacilities){
            $HotelFacilities->slug = Str::slug($HotelFacilities->name, '-');
        });

        static::updating(function($HotelFacilities){
            $HotelFacilities->slug = Str::slug($HotelFacilities->name, '-');
        });
    }
}
