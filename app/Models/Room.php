<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Facility;
use App\Models\RoomImage;

class Room extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'rooms';
    protected $guarded = ['id'];



    // fitur filter pencarian (search)
    public function scopeFilter($query, array $filter)
    {
        $query->when($filter['search'] ?? false, function($query, $search){
            return $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('code_room', 'like', '%' . $search . '%')
                        ->orWhere('price', 'like', '%' . $search . '%');
        });
    }

    protected static function boot()
    {
        parent::boot();

       static::creating(function($room){
            $room->code_room = self::generateCode();
       });
    }


    public static function generateCode()
    {
        do {
            // format kode user
            $code = 'ROOM' . now()->format('Ymd') . '-' . strtoupper(Str::random(6));
        }while(self::where('code_room', $code)->exists());
        return $code;
    }


    public function deleteRoom()
    {
        // path gambar disimpan
        $imagePath = public_path('images/room/' . $this->image);

        // hapus file gambar jika ada
        if(File::exists($imagePath)){
            File::delete($imagePath);
        }

        // hapus data dari database
        return $this->delete();
    }


    // relasi tabel

    public function images()
    {
        return $this->hasMany(RoomImage::class);
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class, 'room_facility');
    }
}
