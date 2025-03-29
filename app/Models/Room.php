<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RoomCategory;

class Room extends Model
{
    use HasFactory;
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


    public function getRouteKeyName()
    {
        return 'code_room';
    }
}
