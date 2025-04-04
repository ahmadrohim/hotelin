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

    // relasi tabel
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function booking()
    {
        return $this->hasMany(Booking::class, 'bookings');
    }


    protected $hidden = [
        'password', 'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function($User){
            $User->slug = Str::slug($User->name, '-');
        });

        static::updating(function($User){
            $User->slug = Str::slug($User->name, '-');
        });
    }

}
