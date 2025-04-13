<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Hotel extends Model
{
    use HasFactory;
    protected $table = 'hotels';
    protected $guarded = ['id'];
   

    // code hotel
    protected static function boot()
    {
        parent::boot();

        static::creating(function($hotel){
            $hotel->code_hotel = self::generateCode();
        });
    }

    // generate code hotel
    public static function generateCode()
    {
        do{
            $code = 'HTL' . now()->format('Ymd') . '_' . strtoupper(Str::random(6));
        }while(self::where('code_hotel', $code)->exists());

        return $code;
    }

}
