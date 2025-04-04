<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use App\Models\RoomCategory;

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

    // relasi tabel
    public function category()
    {
        return $this->belongsTo(RoomCategory::class, 'category_id');
    }

    public function booking()
    {
        return $this->hasMany(Booking::class, 'bookings');
    }

    

    // create dan update code room
    protected static function boot()
    {
        parent::boot();

        // saat membuat room baru
        static::creating(function($room){
            $room->code_room = self::generateCodeRoom($room->category_id);
        });

        // saat mengupdate room
        static::updating(function($room){
            if($room->isDirty('category_id')){
                // hanya ubag code_room jika kategori berubah
                $room->code_room = self::generateCodeRoom($room->category_id);
            }
        });
    }

    // method untuk generate code_room
    public static function generateCodeRoom($category_id)
    {
        $category = RoomCategory::findOrFail($category_id);
        $prefix = strtoupper($category->code_category_room);

        // cari kode kamar terakhir dalam kategori ini
        $lastRoom = self::where('category_id', $category->id)
                    ->where('code_room', 'LIKE', $prefix. '%')
                    ->orderBy('code_room', 'desc')
                    ->first();

        if($lastRoom) {
            $lastNumber = (int) substr($lastRoom->code_room, strlen($prefix));
            $newNumber = $lastNumber + 1;
        }else{
            $newNumber = 1;
        }

        // format code_room dengan padding tiga digit
        $newCodeRoom = $prefix . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

        // pastikan kode room benar-benar unik
        while (self::where('code_room', $newCodeRoom)->exists()){
            $newNumber++;
            $newCodeRoom = $prefix . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
        }

        return $newCodeRoom;

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


    public function getRouteKeyName()
    {
        return 'code_room';
    }
}
