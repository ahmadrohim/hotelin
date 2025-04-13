<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'gallery_tabel';
    protected $guarded = ['id'];


    // code gallery
    protected static function boot()
    {
        parent::boot();

        static::creating(function($gallery){
            $gallery->code_gallery = self::generateCode();
        });
    }

    // generate code
    public static function generateCode()
    {
        do{
            $code = 'GLR' . now()->format('Ymd') . '_' . strtoupper(Str::random(6));
        }while(self::where('code_gallery', $code)->exists());

        return $code;
    }
    
}
