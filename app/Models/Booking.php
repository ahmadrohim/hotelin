<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'bookings';
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
    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function room()
    {
        return $this->belongsTo(Room::class)->withTrashed();
    }
}
