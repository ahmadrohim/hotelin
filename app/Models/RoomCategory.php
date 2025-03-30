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

        // saat kategori baru dibuat
        static::creating(function($RoomCategory){
            $RoomCategory->code_category_room = self::generateCodeCategory($RoomCategory->name);
        });

        // saat kategori diupdate
        static::updating(function($RoomCategory){
            // cek jika nama kategori diubah
            if($RoomCategory->isDirty('name')){
                $RoomCategory->code_category_room = self::generateCodeCategory($RoomCategory->name);
            }
        });
    }

    // fungsi untuk generate kode kategori unik
    protected static function generateCodeCategory($name)
    {
        // ambil 3 huruf pertama dari setiap kata
        $code = strtoupper(
            collect(explode(' ', $name))
                ->map(fn($word) => substr($word, 0, 3))
                ->join('')
        );

        // cari kode terakhir yang mirip, lalu ambil angka terbesar
        $latestCategory = self::where('code_category_room', 'LIKE', $code . '%')
            ->orderBy('code_category_room', 'desc')
            ->first();
            
            if($latestCategory){
                // ambil angka terakhir dari kode yang ada
                preg_match('/\d+$/', $latestCategory->code_category_room, $matches);
                $newNumber = isset($matches[0]) ? ((int) $matches[0] + 1) : 1;
            }else{
                $newNumber = 1;
            }

            return $code . $newNumber;
    }


    // fitur filter pencarian (search)
    public function scopeFilter($query, array $filter)
    {
        $query->when($filter['search'] ?? false, function($query, $search){
            return $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('code_category_room', 'like', '%' . $search . '%')
                        ->orWhere('best_price', 'like', '%' . $search . '%')
                        ->orWhere('max_guests', 'like', '%' . $search . '%');
        });
    }
}
