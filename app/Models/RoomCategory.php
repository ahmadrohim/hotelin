<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Room;

class RoomCategory extends Model
{
    use HasFactory;
    protected $table = 'room_categories';
    protected $guarded = ['id'];

    public function rooms()
    {
        return $this->hasMany(Room::class, 'category_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function($RoomCategory){
            // ambil 3 huruf pertama dari setiap kata
            $code = strtoupper(
                collect(explode(' ', $RoomCategory->name))
                    ->map(fn($word) => substr($word, 0, 3))
                    ->join('')
            );

            // cek apakah sudah ada kategori dengan kode yang sama
            $latestCategory = self::where('code_category_room', 'LIKE', $code . '%')->count();

            // jika ada duplikat, tambahkan angka urut
            $RoomCategory->code_category_room = $code . ($latestCategory +1);
        });

       static::updating(function($RoomCategory){
            $code = strtoupper(
                collect(explode(' ', $RoomCategory->name))
                    ->map(fn($word) => substr($word, 0, 3))
                    ->join('')
            );

            $latestCategory = self::where('code_category_room', 'LIKE', $code . '%')->count();

            $RoomCategory->code_category_room = $code . ($latestCategory + 1);
       });

    }
}
