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
        $query->when($filter['search'] ?? false, function ($query, $search) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            })
            ->orWhereHas('room', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            })
            ->orWhereHas('room.category', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%'); // atau 'category_name' tergantung kolom di tabel
            })
            ->orWhere('check_in_date', 'like', '%' . $search . '%')
            ->orWhere('check_out_date', 'like', '%' . $search . '%')
            ->orWhere('payment_status', 'like', '%' . $search . '%')
            ->orWhere('status', 'like', '%' . $search . '%');
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
