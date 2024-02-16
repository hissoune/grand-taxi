<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class rate extends Model
{
    use HasFactory;
    protected $fillable=[
      
        'user_id',
        'driver_taxi_id',
        'rate',
        'comment',
    ];
    use SoftDeletes;

    
    public function driver_taxi()
    {
        return $this->belongsTo(driver_taxi::class,'driver_taxi_id');
    }
    public function rate()
    {
        return $this->hasMany(rate::class,'driver_taxi_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
