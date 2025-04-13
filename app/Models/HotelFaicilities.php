<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class HotelFaicilities extends Model
{
    use HasFactory;
    protected $table = 'hotel_facilities';
    protected $guarded = ['id'];


    public function scopeFilter($query, array $filter)
    {
        $query->when($filter['search'] ?? false, function($query, $search){
            return $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%');
        });
    }

  
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


    public function deleteFacilities()
    {
        $imagePath = public_path('images/services/' . $this->image);

        if(File::exists($imagePath)){
            File::delete($imagePath);
        }

        return $this->delete();
    }
    
}
