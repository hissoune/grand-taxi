<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'image',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            // Soft delete associated driver_taxi records
            if($user->driver){$user->driver->delete();}
           if($user->reservation){$user->reservation->each->delete();} 
           if($user->rate){$user->rate->each->delete();} 
        });
       
    }
   
    public function reservation()
    {
        return $this->hasMany(reservationn::class, 'users_id');
    }
    public function rate()
    {
        return $this->hasMany(rate::class, 'user_id');
    }

    public function driver()
    {
        return $this->hasOne(driver_taxi::class, 'user_id');
    }
}
