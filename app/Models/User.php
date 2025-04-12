<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use App\Models\Role;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $guarded = ['id'];

      // fitur filter pencarian (search)
    public function scopeFilter($query, array $filter)
    {
        $query->when($filte['search'] ?? false, function($query, $search){
            $query->whereHas('roles', function($q) use ($search){
                $q->where('role_name', 'like'. '%' . $search . '%');
            })->orWhere('name', 'like', '%' . $search . '%')->orWhere('email', 'like', '%' . $search . '%')->orWhere('created_at', 'like', '%' . $search . '%');
        });
    }


    // generate code_user
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function($user){
            $user->code_user = self::generateCode();
        });
    }

    public static function generateCode()
    {
        do {
            // format kode user
            $code = 'USR' . now()->format('Ymd') . '-' . strtoupper(Str::random(6));
        }while(self::where('code_user', $code)->exists());

        return $code;
    }
   


    // relasi tabel
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }


    protected $hidden = [
        'password', 'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


}
