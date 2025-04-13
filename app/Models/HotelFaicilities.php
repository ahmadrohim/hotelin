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

  
    // code facilities
    protected static function boot()
    {
        parent::boot();

        static::creating(function($facilities){
            $facilities->code_facilities = self::generateCode();
        });
    }

    // generate code_facilities
    public static function generateCode()
    {
        do{
            $code = 'FSL' . now()->format('Ymd') . '_' . strtoupper(Str::random(6));
        }while(self::where('code_facilities', $code)->exists());

        return $code;
    }
    
}
