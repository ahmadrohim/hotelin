<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Hotel extends Model
{
    use HasFactory;
    protected $table = 'hotels';

    protected $fillable = [
        'name',
        'slug',
        'address',
        'description',
        'email',
        'phone',
        'image',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($hotel) {
            $hotel->slug = Str::slug($hotel->name, '-');
        });

        static::updating(function ($hotel) {
            $hotel->slug = Str::slug($hotel->name, '-');
        });
    }

}
